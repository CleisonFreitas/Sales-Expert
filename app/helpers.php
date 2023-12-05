<?php

declare(strict_types=1);

use App\Models\Company;

if (!function_exists('get_company')) {

    /**
     * @return Company $company
     */
    function get_company(): ?object
    {
        return Company::first();
    }
}
