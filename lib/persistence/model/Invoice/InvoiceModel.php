<?php

class InvoiceModel
{
    public function __construct()
    {

    }

    private $identity = null;
    private $invoice_identifier = null;

    private $customer_profile_id = null;
    private $customer_email_id = null;
    private $customer_address_id = null;

    private $product_invoice_id = null;

    private $charged_price = null;
    private $invoice_charge_response_id = null;
    private $invoice_status_id = null;

    private $contact_seller_name_id = null;
    private $contact_address = null;
    private $contact_email = null;
    private $contact_cvr = null;

    private $contact_company_logo = null;

    private $invoice_is_due = null;
    private $invoice_was_send = null;

    private $footer = null;

    private $parent_invoice_id = null;

    //
    /**
     * @return null
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @return null
     */
    public function getChargedPrice()
    {
        return $this->charged_price;
    }

    /**
     * @return null
     */
    public function getContactAddress()
    {
        return $this->contact_address;
    }

    /**
     * @return null
     */
    public function getContactCompanyLogo()
    {
        return $this->contact_company_logo;
    }

    /**
     * @return null
     */
    public function getContactCvr()
    {
        return $this->contact_cvr;
    }

    /**
     * @return null
     */
    public function getContactEmail()
    {
        return $this->contact_email;
    }

    /**
     * @return null
     */
    public function getContactSellerNameId()
    {
        return $this->contact_seller_name_id;
    }

    /**
     * @return null
     */
    public function getCustomerAddressId()
    {
        return $this->customer_address_id;
    }

    /**
     * @return null
     */
    public function getCustomerEmailId()
    {
        return $this->customer_email_id;
    }

    /**
     * @return null
     */
    public function getCustomerProfileId()
    {
        return $this->customer_profile_id;
    }

    /**
     * @return null
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @return null
     */
    public function getInvoiceChargeResponseId()
    {
        return $this->invoice_charge_response_id;
    }

    /**
     * @return null
     */
    public function getInvoiceIdentifier()
    {
        return $this->invoice_identifier;
    }

    /**
     * @return null
     */
    public function getInvoiceIsDue()
    {
        return $this->invoice_is_due;
    }

    /**
     * @return null
     */
    public function getInvoiceStatusId()
    {
        return $this->invoice_status_id;
    }

    /**
     * @return null
     */
    public function getInvoiceWasSend()
    {
        return $this->invoice_was_send;
    }

    /**
     * @return null
     */
    public function getParentInvoiceId()
    {
        return $this->parent_invoice_id;
    }

    /**
     * @return null
     */
    public function getProductInvoiceId()
    {
        return $this->product_invoice_id;
    }

    /**
     * @param null $identity
     */
    public function setIdentity($identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @param null $charged_price
     */
    public function setChargedPrice($charged_price): void
    {
        $this->charged_price = $charged_price;
    }

    /**
     * @param null $contact_address
     */
    public function setContactAddress($contact_address): void
    {
        $this->contact_address = $contact_address;
    }

    /**
     * @param null $contact_company_logo
     */
    public function setContactCompanyLogo($contact_company_logo): void
    {
        $this->contact_company_logo = $contact_company_logo;
    }

    /**
     * @param null $contact_cvr
     */
    public function setContactCvr($contact_cvr): void
    {
        $this->contact_cvr = $contact_cvr;
    }

    /**
     * @param null $contact_email
     */
    public function setContactEmail($contact_email): void
    {
        $this->contact_email = $contact_email;
    }

    /**
     * @param null $contact_seller_name_id
     */
    public function setContactSellerNameId($contact_seller_name_id): void
    {
        $this->contact_seller_name_id = $contact_seller_name_id;
    }

    /**
     * @param null $customer_address_id
     */
    public function setCustomerAddressId($customer_address_id): void
    {
        $this->customer_address_id = $customer_address_id;
    }

    /**
     * @param null $customer_email_id
     */
    public function setCustomerEmailId($customer_email_id): void
    {
        $this->customer_email_id = $customer_email_id;
    }

    /**
     * @param null $customer_profile_id
     */
    public function setCustomerProfileId($customer_profile_id): void
    {
        $this->customer_profile_id = $customer_profile_id;
    }

    /**
     * @param null $footer
     */
    public function setFooter($footer): void
    {
        $this->footer = $footer;
    }

    /**
     * @param null $invoice_charge_response_id
     */
    public function setInvoiceChargeResponseId($invoice_charge_response_id): void
    {
        $this->invoice_charge_response_id = $invoice_charge_response_id;
    }

    /**
     * @param null $invoice_identifier
     */
    public function setInvoiceIdentifier($invoice_identifier): void
    {
        $this->invoice_identifier = $invoice_identifier;
    }

    /**
     * @param null $invoice_is_due
     */
    public function setInvoiceIsDue($invoice_is_due): void
    {
        $this->invoice_is_due = $invoice_is_due;
    }

    /**
     * @param null $invoice_status_id
     */
    public function setInvoiceStatusId($invoice_status_id): void
    {
        $this->invoice_status_id = $invoice_status_id;
    }

    /**
     * @param null $invoice_was_send
     */
    public function setInvoiceWasSend($invoice_was_send): void
    {
        $this->invoice_was_send = $invoice_was_send;
    }

    /**
     * @param null $parent_invoice_id
     */
    public function setParentInvoiceId($parent_invoice_id): void
    {
        $this->parent_invoice_id = $parent_invoice_id;
    }

    /**
     * @param null $product_invoice_id
     */
    public function setProductInvoiceId($product_invoice_id): void
    {
        $this->product_invoice_id = $product_invoice_id;
    }
}

?>