<?php
    /**
     *  Title: Autoloader
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    class Autoloader
    {
        /**
         * 
         */
        public function __construct( $root_dir )
        {
            $this->setLibraryRoot( $root_dir );
        }

        // internal variables
        private $library_root_directory = null;
        private $packages = null;

        // functions
        /**
         * 
         */
        public function load()
        {
            $this->load_dir( $this->getLibraryRoot() );   
        }

        /**
         * 
         */
        public function load_dir( $directory )
        {
            $arr = scandir( $directory );

            for( $idx = 0; 
                $idx < sizeof( $arr ); 
                $idx ++ )
            {
                if( $arr[$idx] == '.' ||  $arr[$idx] == '..' )
                {
                    continue;
                }

                $selected = $arr[$idx];
                $current = $directory . "/" . $selected;

                if( is_dir( $current ) )
                {
                    $this->load_dir( $current );
                }

                if( is_file( $current ) )
                {
                    $this->append_class( $selected, $current );
                }
            }
        }

        /**
         * 
         */
        public function append_class( $class_name, $class_path )
        {
            if( $this->packages == null )
            {
                $this->packages = array();
            }

            array_push( $this->packages, new LoadedPackage( $class_name, $class_path ) );        
        }

        /**
         * 
         */
        public function extract_class( $class_name )
        { 
            for( $idx = 0; 
                $idx < sizeof( $this->packages ); 
                $idx++ )
            {
                $current = $this->packages[$idx];

                if( ( $current->getPackageName() == ( $class_name . '.php' ) ) && file_exists( $current->getPackagePath() ) )
                {
                    include $current->getPackagePath();
                }
            }
        }

        // Accessors
        /**
         * 
         */
        public function getLibraryRoot()
        {
            return $this->library_root_directory;
        }

        /**
         * 
         */
        public function setLibraryRoot( $var )
        {
            $this->library_root_directory = $var;
        }

        /**
         * 
         */
        public function getPackages()
        {
            return $this->packages;
        }

        /**
         * 
         */
        public function setPackages( $var )
        {
            $this->packages = $var;
        }

    }

    /**
     * 
     */
    class LoadedPackage
    {
        /**
         * 
         */
        public function __construct( $name, $path )
        {
            $this->setPackageName( $name );
            $this->setPackagePath( $path );
        }

        private $package_name = null;
        private $package_path = null;

        /**
         * 
         */
        public function getPackageName()
        {
            return $this->package_name;
        }

        /**
         * 
         */
        public function setPackageName( $var )
        {
            $this->package_name = $var;
        }

        /**
         * 
         */
        public function getPackagePath()
        {
            return $this->package_path;
        }

        /**
         * 
         */
        public function setPackagePath( $var )
        {
            $this->package_path = $var;
        }
    }

?>