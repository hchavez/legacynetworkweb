<?php

use Illuminate\Database\Seeder;

class PrevValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            \App\User::where('email', '=', $item[0])->update([
                'synergy_prev_value' => $item[1],
                'synergy_prev_left_leg_cv' => $item[2],
                'synergy_prev_right_leg_cv' => $item[3],
            ]);
        }
    }

    public function data()
    {
        return [
            ['partners@legacynetwork.com', 2640.5, 2384.5, 7523.5],
            ['candyscoops@gmail.com', 150, 2234.5, 0],
            ['hullingerlegacy@gmail.com', 3354, 3204, 4169.5],
            ['LegacyBTM@gmail.com', 950, 1384.5, 600],
            ['bradyjex@gmail.com', 150, 1234.5, 0],
            ['mariebench@yahoo.com', 306, 931.5, 150],
            ['LIZZYRICHARDSON2011@GMAIL.COM', 1216, 1066, 1988],
            ['kim.elevate@gmail.com', -495, 1426.5, -495],
            ['donr70@gmail.com', 150, 150, 1838],
            ['usbornefarrah@gmail.com', 300, 1538, 150],
            ['lindatuttle@gmail.com', 495, 1043, 345],
            ['jhatch08@yahoo.com', 60, 983, 0],
            ['luzmirasanchez4444@gmail.com', 1468, 2701.5, 1318],
            ['hullinger6@gmail.com', 762.5, 1939, 612.5],
            ['feigwe@yahoo.com', 150, 0, 1168],
            ['laward2000@yahoo.com', 282, 259, 155],
            ['wenkhoughton@gmail.com', 770.5, 1168.5, 620.5],
            ['gwhite1080@gmail.com', 150, 1276.5, 0],
            ['jamesbandjulie@gmail.com', 584, 508, 510],
            ['tljutah@gmail.com', 320.5, 150, 300],
            ['tracey@nowican.org', 588.5, 481, 529],
            ['Lynda@rrenviro.com', 139, -71, 150],
            ['dave.hill@me.com', 250, 281, 0],
            ['kiki0415@gmail.com', 154, -300, 0],
            ['brooke.e.dean@gmail.com', 270, 0, 300],
            ['kathyrasmussen005@gmail.com', 150, 650, 0],
            ['colewhit92@gmail.com', 478, 800, 325],
            ['cuclimbing@hotmail.com', 329, 152, 265],
            ['legacynetwork.leanna@gmail.com', 238, 0, -808],
            ['jenkinsv3success@gmail.com', 1610, 6075.5, 1340],
            ['fluterward@gmail.com', 80, 0, 0],
            ['julielewis76@gmail.com', 150, 0, 450],
            ['elisachoskins@gmail.com', 75, -450, 0],
            ['Megtiritilli@gmail.com', 150, 500, 0],
            ['team@strategiclegacybuilders.com', 200, 325, 0],
            ['partnershippath@gmail.com', 225, 150, 150],
            ['subarashimomma@gmail.com', 150, 195, 0],
            ['amyn623@gmail.com', 150, 0, 150],
            ['nmoore554@gmail.com', 115, 0, 150],
            ['ginabroadwell@gmail.com', 175, 150, 0],
            ['liveyourlegacy18@gmail.com', -208, -358, 489],
            ['amispaige@gmail.com', 75, 0, 0],
            ['jeremiahII@hotmail.com', 231, 132, 180],
            ['getyour2now@live.com', 330, 1020, 160],
            ['ryangjohnson17@gmail.com', 75, 0, 0],
            ['dcalder12@yahoo.com', 75, 0, 0],
            ['choose2rejoice@gmail.com', 260.25, 157.5, 150],
            ['brooks@banasky.com', 75, 0, 0],
            ['Julene06@msn.com', 150, 0, 300],
            ['holland.n.brittany@gmail.com', 200, 660, 100],
            ['joel@nowican.org', 264.5, 225, 150],
            ['joshuawhitaker22@gmail.com', 150, 0, 175],
            ['Josephdlockwood@gmail.com', 150, 0, 0],
            ['mylegacynetwork@gmail.com', 82.5, 0, 0],
            ['jeffdooley3@yahoo.com', 75, 0, 0],
            ['cheriegleave@gmail.com', 75, 0, 0],
            ['jontroyjones@yahoo.com', 150, 150, 0],
            ['sarah.stew72@gmail.com', 150, 0, 150],
            ['Whitaker@ohdbc.com', 100, 0, 0],
            ['stephmc923@hotmail.com', 75, 0, 0],
            ['pedermco2131@gmail.com', 75, 0, 0],
            ['johnbowker.voice@yahoo.com', 75, 0, 0],
            ['emily.h.mecham@gmail.com', 75, 0, 0],
            ['kingdave1@gmail.com', 75, 0, 0],
            ['allisonk99@hotmail.com', 75, 0, 0],
            ['stacey@theranches.com', 120, 0, 0],
            ['Lori@justlori.com', 77, 0, 0],
            ['lynnpayne3@gmail.com', 75, 0, 0],
            ['traceywalk03@gmail.com', 75, 0, 0],
            ['anjanelsmassage@gmail.com', 100, 0, 0],
            ['drdrake17@gmail.com', 75, 0, 0],
            ['lilyannpeeler@yahoo.com', 325, 175, 658],

        ];
    }


}
