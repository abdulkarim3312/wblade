<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\GalleryHeader;
use App\Models\GalleryTopSection;
use App\Models\HomeSecondSection;
use App\Models\HomeVideo;
use App\Models\PrivacyTerm;
use App\Models\Studio;
use App\Models\StudioHeader;
use App\Models\Subscribe;

class HomePageController extends Controller
{
    public function home()
    {
        $videoLink = HomeVideo::first();
        $secondSection = HomeSecondSection::first();
        $gallery = GalleryTopSection::first();
        // dd($gallery);
        $topGallery = Gallery::get();
        $studios = Studio::get();
        $studioHeader = StudioHeader::first();
        $galleryHeader = GalleryHeader::first();
        $subscribe = Subscribe::first();
        return view('frontend.pages.home', compact('videoLink', 'secondSection', 'gallery', 'topGallery', 'studios', 'studioHeader', 'galleryHeader', 'subscribe'));
    }
    public function terms()
    {
        $terms = PrivacyTerm::where('page_type', 2)->first();
        return view('frontend.pages.terms', compact('terms'));
    }
    public function privacyPolicy()
    {
        $privacy = PrivacyTerm::where('page_type', 1)->first();
        return view('frontend.pages.privacy_policy', compact('privacy'));
    }
}
