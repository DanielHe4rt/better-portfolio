<?php


namespace App\Enums\Profile;


use App\Enums\Enum;

abstract class ProfileEnum extends Enum
{
    const FULLNAME = 1;
    const PICTURE_URL = 2;
    const SHORT_DESC = 3;
    const ABOUT = 4;
    const TWITTER_URL = 5;
    const GITHUB_URL = 6;
    const LINKEDIN_URL = 7;
    const CONTACT_MAIL = 8;
    const PHONE_NUMBER = 9;
}
