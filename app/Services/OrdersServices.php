<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\OrdersRepository;
use App\User;
use Illuminate\Container\Container as App;

class OrdersServices extends Services
{
    /**
     * @var ActivationPacksServices
     */
    private $activationPacksServices;
    /**
     * @var AutoShipsServices
     */
    private $autoShipsServices;
    /**
     * @var LnFeesServices
     */
    private $lnFeesServices;

    /**
     * OrdersServices constructor.
     * @param App $app
     * @param ActivationPacksServices $activationPacksServices
     * @param AutoShipsServices $autoShipsServices
     * @param LnFeesServices $lnFeesServices
     */
    public function __construct(
        App $app,
        ActivationPacksServices $activationPacksServices,
        AutoShipsServices $autoShipsServices,
        LnFeesServices $lnFeesServices
    )
    {
        parent::__construct($app);
        $this->activationPacksServices = $activationPacksServices;
        $this->autoShipsServices = $autoShipsServices;
        $this->lnFeesServices = $lnFeesServices;
    }

    function repository()
    {
        return OrdersRepository::class;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function createOrderRecordUponRegistration(User $user, array $data)
    {
        if (isset($data['activation_pack_id'])) {
            $activationPack = $this->activationPacksServices->find($data['activation_pack_id']);

            if (!$activationPack) {
                $activationPack = new \stdClass();
                $activationPack->id = null;
                $activationPack->name = null;
                $activationPack->price = null;
                $activationPack->description = null;
            }
        } else {
            $activationPack = new \stdClass();
            $activationPack->id = null;
            $activationPack->name = null;
            $activationPack->price = null;
            $activationPack->description = null;
        }

        if (isset($data['product_id'])) {
            $product = $this->activationPacksServices->find($data['product_id']);

            if (!$product) {
                $product = new \stdClass();
                $product->id = null;
                $product->name = null;
                $product->price = null;
                $product->description = null;
            }
        } else {
            $product = new \stdClass();
            $product->id = null;
            $product->name = null;
            $product->price = null;
            $product->description = null;
        }




        $autoShip = $this->autoShipsServices->find($data['auto_ship_id']);
        $lnFee = $this->lnFeesServices->find($data['ln_fee_id']);

        $createData = [
            'user_id' => $user->id,
            'user_name' => $user->full_name,
            'user_email' => $user->email,
            'activation_pack_id' => $activationPack->id,
            'activation_pack_name' => $activationPack->name,
            'activation_pack_price' => $activationPack->price,
            'activation_pack_desc' => $activationPack->description,
            'auto_ship_id' => $autoShip->id,
            'auto_ship_name' => $autoShip->name,
            'auto_ship_price' => $autoShip->price,
            'auto_ship_desc' => $autoShip->description,
            'ln_fee_id' => $lnFee->id,
            'ln_fee_name' => $lnFee->name,
            'ln_fee_price' => $lnFee->price,
            'ln_fee_desc' => $lnFee->description,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'product_desc' => $product->description,
        ];

        $this->create($createData);
    }

    public function createOrderRecordAfterEliteChallengeSignup(User $user, $product)
    {
        $createData = [
            'user_id' => $user->id,
            'user_name' => $user->full_name,
            'user_email' => $user->email,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'product_desc' => $product->description,
        ];

        $this->create($createData);
    }
}