<?php

namespace App\Jobs;

use App\Repositories\NotificationMessagesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrganizationMessage
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var string
     */
    public $body;
    /**
     * @var array
     */
    public $userAchievementLevelsArray;
    /**
     * @var
     */
    private $sendType;
    /**
     * @var
     */
    private $subject;
    private $specificEmails;

    /**
     * Create a new job instance.
     *
     * @param $subject
     * @param $body
     * @param $userAchievementLevelsArray
     * @param $sendType
     * @param $specificEmails
     */
    public function __construct($subject, $body, $userAchievementLevelsArray, $sendType, $specificEmails)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->userAchievementLevelsArray = $userAchievementLevelsArray;
        $this->sendType = $sendType;
        $this->specificEmails = $specificEmails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UsersRepository $usersRepository, NotificationMessagesRepository $notificationMessagesRepository)
    {
        $users = $usersRepository->getUsersByAchievementLevels($this->userAchievementLevelsArray);

        $recipients = [];
        foreach ($users as $user) {
            $recipients[] = strtolower($user->email);
            if (in_array($this->sendType, ['both', 'notification'])) {
                $notificationMessagesRepository->create([
                    'user_id' => $user->id,
                    'message' => $this->body,
                ]);
            }
        }

        if (in_array($this->sendType, ['both', 'email'])) {
            Mail::bcc($recipients)
                ->send(new \App\Mail\OrganizationMessage($this->subject, $this->body));
        }

        if ($this->sendType == 'test_emails') {
            Mail::to(['partners@legacynetwork.com', 'andrew@fifthmissionmarketing.com', 'isaac@fifthmissionmarketing.com'])
                ->send(new \App\Mail\OrganizationMessage($this->subject, $this->body));
        }

        if ($this->sendType == 'specific_emails') {
            Mail::to($this->specificEmails)
                ->send(new \App\Mail\OrganizationMessage($this->subject, $this->body));
        }
    }
}
