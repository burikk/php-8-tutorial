<?php

declare(strict_types=1);

namespace App\Controller;

use App\Container;
use App\Model\Invoice;
use App\Model\SignInvoice;
use App\Model\User;
use App\Services\InvoiceService;
use App\View;

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    public function index(): View
    {
        $email = uniqid('email@mail.com');
        $name = 'Banana Bond';
        $amount = 1000;
        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignInvoice($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' => $name,
            ],
            [
                'amount' => $amount,
            ]
        );

        $this->invoiceService->process([], 25);
        return View::make('index.php', ['invoice' => $invoiceModel->find($invoiceId)]);
    }
}