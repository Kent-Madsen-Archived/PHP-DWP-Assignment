<?php 
class ImageLike
{
    function __construct( $identity, $image_post_identity, $profile_identity ) 
    {
        $this->setIdentity( $identity );
        $this->setImagePostIdentity( $image_post_identity );
        $this->setProfileIdentity( $profile_identity );
    }

    private $identity;
    private $image_post_identity;
    private $profile_identity;

    public function getIdentity()
    {
        return $this->identity;
    }

    public function setIdentity( $identity )
    {
        $this->identity = $identity;
    }

    public function getProfileIdentity()
    {
        return $this->profile_identity;
    }

    public function setProfileIdentity( $identity )
    {
        $this->profile_identity = $identity;
    }

    public function getImagePostIdentity()
    {
        return $this->image_post_identity;
    }

    public function setImagePostIdentity( $identity )
    {
        $this->image_post_identity = $identity;
    }
}

?>