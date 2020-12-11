<?php
    /**
     *  Title: Index
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Page
     *  Project: DWP-Assignment
     */

    // Internal Libraries
    require 'inc/bootstrap.php';

    $encode = htmlentities( getEncodingStandard() );
    header( "Content-Type: text/html; charset={$encode}" );

    // Set"s it so, that sessions can only be used by cookies and disallows it in the url.
    // It removes URL based attacks 
    ini_set( 'session.use_only_cookies', true );

    // Setup session if it's not called by default
    // in php.ini set session.auto_start to 1
    session_start();

    require 'vendor/autoload.php';

   if( isset( $_POST['pay_is_submitted'] ) )
   {
       \Stripe\Stripe::setApiKey('sk_test_51HwmmbHfiP2HcRWA5fy2AjFSt7eMfZzkAMOn3bjEXtrLCFt39d9RMAGJywXwxKSgTG8lOL3pHqirPGMTmJxRSc6G00Gil5vqlq');

       $domain = new CheckoutDomain();
       $invoice_id = $domain->purchase();

        //
        if( SessionBasketForm::existBasketValues() )
        {
            SessionBasketForm::clearBasketValues();
        }

        $token = $_POST['stripe_token'];

        $invoice_factory = new InvoiceDomain();
        $invoice = $invoice_factory->retrieveInvoiceByIdentity($invoice_id);

        $pif = GroupAuthentication::getProfileInformationFactory();
        $user = $pif->createModel();
        $user->setProfileId($invoice->getProfileId());
        $pif->readModel($user);

        $total = intval($invoice->getTotalPrice() * 100);

        $ef = GroupAuthentication::getPersonEmailFactory();
        $em = $ef->createModel();
        $em->setIdentity($user->getPersonEmailId());
        $ef->readModel($em);

        $nf = GroupAuthentication::getPersonNameFactory();
        $pnm = $nf->createModel();
        $pnm->setIdentity($user->getPersonNameId());
        $nf->readModel($pnm);

        $full_name = "{$pnm->getFirstName()} {$pnm->getLastName()} {$pnm->getLastName()}";

        $paf = GroupAuthentication::getPersonAddressFactory();
        $pam = $paf->createModel();
        $pam->setIdentity($user->getPersonAddressId());
        $paf->readModel($pam);

        $line = "{$pam->getStreetAddressName()} {$pam->getStreetAddressNumber()}";

        $charge = \Stripe\Charge::create(
            array(
                'amount' => $total,
                'currency' => 'DKK',
                'description'=>'',

                'source' => $token,

                'shipping' => array(
                    'name'=> $full_name,
                    'address'=> array(
                        'city'=>$pam->getCity(),
                        'country'=>$pam->getCountry(),
                        'line1'=>$line,
                        'postal_code'=>$pam->getZipCode()
                    ),
                    'phone'=>'+45' . $user->getPersonPhone()
                ),
                'receipt_email'=>$em->getContent()
            )
        );

        redirect_to_local_page("/invoice/identity/{$invoice_id}");
   }
?>