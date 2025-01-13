<?php

namespace App\Jobs;

use App\Models\Product;
use App\Mail\ProductCreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendProductCreatedNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $product;

    /**
     * Create a new job instance.
     *
     * @param  Product  $product
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = config('products.email');

        Mail::to($email)->send(new ProductCreatedNotification($this->product));
    }
}
