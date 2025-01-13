<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function editArticle(User $user, Product $product): bool
    {
        $role = $user->role;
        return $role ===  config('products.admin');
    }


    public function update(User $user, Product $product): bool
    {
        return true;
    }
}
