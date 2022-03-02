<?php

namespace App\Http\Controllers;

use App\Repositories\FaqCategoriesRepository;
use App\Services\FaqServices;
use Illuminate\Http\Request;

class SupportFaqController extends Controller
{
    /**
     * @var FaqServices
     */
    private $faqServices;
    /**
     * @var FaqCategoriesRepository
     */
    private $faqCategoriesRepository;

    /**
     * SupportFaqController constructor.
     * @param FaqServices $faqServices
     * @param FaqCategoriesRepository $faqCategoriesRepository
     */
    public function __construct(FaqServices $faqServices, FaqCategoriesRepository $faqCategoriesRepository)
    {
        $this->faqServices = $faqServices;
        $this->faqCategoriesRepository = $faqCategoriesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;
        $data['faq_categories'] = $this->faqCategoriesRepository->all(['*'], ['faqs']);


        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.support.faq', $data);
    }



}
