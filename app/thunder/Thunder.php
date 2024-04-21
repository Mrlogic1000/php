<?php
namespace Thunder;
defined('FCPATH') OR exit("Access Denied");
class Thunder
{
    public function make(array $args){
        $action         = $args[1] ?? null;
        $folder         = $args[2] ?? null;
        $class_name     = $args[3] ?? null;
        

        if($action=="make:plugin"){
        $original_folder = $folder;
        $folder = 'plugins/'.$folder;

        if(file_exists($folder)){
            $this->message("That plugin folder already exist", $die=true);
        }

        // main plugin folder
        mkdir($folder,0777,true);

        // css folder
        $css_folder = $folder. "/assets/css";
        mkdir($css_folder,0777,true);

        // js folder
        $js_folder = $folder. "/assets/js";
        mkdir($js_folder,0777,true);

        // fonts folder
        $font_folder = $folder. "/assets/fonts";
        mkdir($font_folder,0777,true);

        // images folder
        $images_folder = $folder. "/assets/images";
        mkdir($images_folder,0777,true);
        
        // controllers folder
        $controller_folder = $folder. "/controllers";
        mkdir($controller_folder,0777,true);

            // views folder
        $views_folder = $folder. "/views";
        mkdir($views_folder,0777,true);

        // migrations folder
        $migrations_folder = $folder. "/migrations";
        mkdir($migrations_folder,0777,true);

        // modules folder
        $module_folder = $folder. "/models";
        mkdir($module_folder,0777,true);


        $sample_folder = "app/thunder/samples/";
        // copy 
        // plugin files
        $plugins_file = $folder. "/plugin.php";
        $plugins_file_source = $sample_folder."plugin-sample.php";

        if(file_exists($plugins_file_source)){            
            copy($plugins_file_source,$plugins_file);
        }else{
            $this->message("plugins sample not found :$plugins_file_source");
        }

        // controller filesc
        
        $controller_file = $folder. "/controllers/controller.php";
        $controller_file_source =  $sample_folder."controller-sample.php";

        if(file_exists($controller_file_source)){            
            copy($controller_file_source,$controller_file);
        }else{
            $this->message("Controller sample not found :$controller_file_source");
        }

         // copy 
        // view files
        $view_file = $folder. "/views/view.php";
        $view_file_source =  $sample_folder."view-sample.php";

        if(file_exists($view_file_source)){           
            copy($view_file_source,$view_file);
        }else{
            $this->message("View sample not found :$view_file_source");
        }

         // copy 
        // js files
        $js_file = $folder. "/assets/js/plugin.js";
        $js_file_source =  $sample_folder."js-sample.js";

        if(file_exists($js_file_source)){           
            copy($js_file_source,$js_file);
        }else{
            $this->message("js sample not found :$js_file_source");
        }
        
         // copy 
        // css files
        $css_file = $folder. "/assets/css/style.css";
        $css_file_source =  $sample_folder."css-sample.css";

        if(file_exists($css_file_source)){           
            copy($css_file_source,$css_file);
        }else{
            $this->message("css sample not found :$css_file_source");
        }
         // copy 
        // config files
        $config_file = $folder. "/config.json";
        $config_file_source =  $sample_folder."config-sample.json";

        if(file_exists( $config_file_source)){           
            copy($config_file_source,$config_file);
        }else{
            $this->message("config sample not found :$config_file_source");
        }
        
        $this->message("Plugin creation complete");

    }else
    /**
     * -----------------------------------------
     * The following code block is for migration
     * ------------------------------------------
     */
        if($action=='make:migration'){
        
            $original_folder = $folder;
            $folder = 'plugins/'.$folder."/";
            
                if(!file_exists($folder))
                    $this->message("Plugin folder not found", true);                
    
                $migration_folder = $folder ."migrations/";
                if(!file_exists($migration_folder))
                    mkdir($migration_folder,0777,true);

                $file_sample = "app/thunder/samples/migration-sample.php";

                if(!file_exists($file_sample))
                    $this->message("sample file is not found in the ".$file_sample,true);

                    if(empty($class_name))
                    $this->message("Please provide a class name for the migration file",true);
                   

                $class_name = preg_replace("/[^a-zA-Z_\-]/","",$class_name);
                
                $class_name = str_replace('-','_',$class_name);

                $class_name = ucfirst($class_name);
                $table_name = strtolower($class_name);
                
                $content = file_get_contents($file_sample);

                $content = str_replace("{TABLE_NAME}",$table_name,$content);
                $content = str_replace("{CLASS_NAME}",$class_name,$content);

                $filename = $migration_folder . date("Y-m-d_His_").$table_name.".php";
                file_put_contents($filename,$content);
                $this->message("Migration file created. Filename".$filename, true); 
    
            
        }else
        /**
     * -----------------------------------------
     * The following code block is for Model
     * ------------------------------------------
     */
        if($action == "make:model"){
            $original_folder = $folder;
            $folder = 'plugins/'.$folder."/";
            
                if(!file_exists($folder))
                    $this->message("Plugin folder not found", true);                
    
                $model_folder = $folder ."models/";
                if(!file_exists($model_folder))
                    mkdir($model_folder,0777,true);

                $file_sample = "app/thunder/samples/model-sample.php";

                if(!file_exists($file_sample))
                    $this->message("sample file is not found in the ".$file_sample,true);

                    if(empty($class_name))
                    $this->message("Please provide a class name for the model file",true);
                   

                $class_name = preg_replace("/[^a-zA-Z_\-]/","",$class_name);
                
                $class_name = str_replace('-','_',$class_name);

                $class_name = ucfirst($class_name);
                $table_name = strtolower($class_name);
                
                $content = file_get_contents($file_sample);

                $content = str_replace("{TABLE_NAME}",$table_name,$content);
                $content = str_replace("{CLASS_NAME}",$class_name,$content);

                $namespace = str_replace("-"," ",$original_folder);
                $namespace = ucwords($namespace);
                $namespace = str_replace(" ","",$original_folder);

                $content = str_replace("{NAMESPACE}",$namespace,$content);

                $filename = $model_folder .$class_name.".php";
                file_put_contents($filename,$content);
                $this->message("model file created. Filename".$filename, true);

        }else{
            $this->message("unknow comad".$action);
        }
    }


    public function migrate(array $args){
        $action         = $args[1] ?? null;
        $folder         = $args[2] ?? null;
        $file_name     = $args[3] ?? null;

        if($action =='migrate' || $action=='migrate:rollback'){
        
            $folder = 'plugins/'. $folder . '/migrations/';
            if(!is_dir($folder))             
                $this->message("No migration file found in the location");
               

            if(!empty($file_name)){                
                // run single file                               
                $file = $folder.$file_name;
                $this->message("Migrating file.".$file);

                require_once $file;
                $class_name = basename($file);
                preg_match("/[a-zA-Z_]+\.php$/",$class_name, $match);
                $class_name = ucfirst(str_replace(".php","",$match[0]));
                $class_name = trim($class_name,'_');

               $myclass = new ("\Migration\\$class_name");
               if($action=='migrate'){
                $myclass->up();
               }else{                
                $myclass->down();
               }

                $this->message("Class name: ". $class_name);

                $this->message("Migration complete!.");
                $this->message("File:".$file_name);

            }else{
                // run all file                
                $files = glob($folder."*.php");
                
                if(!empty($files)){
                    foreach($files as $file){
                        $this->message("Migrating file.".$file);

                        require_once $file;
                        $class_name = basename($file);
                        preg_match("/[a-zA-Z_]+\.php$/",$class_name, $match);
                        $class_name = ucfirst(str_replace(".php","",$match[0]));
                        $class_name = trim($class_name,'_');

                       $myclass = new ("\Migration\\$class_name");
                       if($action=='migrate'){
                        $myclass->up();
                       }else{
                        echo "here";
                        $myclass->down();
                       }

                        $this->message("Class name: ". $class_name);
                    }
                    $this->message("Migration complete!.");

                }else{
                    $this->message("No migration file found in the location");
                }
            }
            

            }else
                if($action=='migrate:refresh'){
                    $this->migrate(['thunder', 'migrate:rollback',$folder,$file_name]);
                    $this->migrate(['thunder', 'migrate',$folder,$file_name]);
                    
                }           
            
            
        

        
    }


    public function help(string|array $version):void
    {
        $version = is_array($version) ? $version[0] : $version;
        echo "
        Thunder v$version Command Line Tool
        Database       
        migrate............Locates and runs a migration from the specified plugin floder.
        migrate:refresh....Does  refresh (run down and up) the current state of the database.
        migrate:rollback...Runs the 'down' method for a migration in the folder.

        Generators
        make:plugin........Create a folder with all essential filess
        make:migration.....Generates  a new migration file.
        make:model.........Generates a new model file.
       
        Others
        list:migration.....Display all the migration files.
       
        ";
    }

    private function message(string $message, bool $die = false):void{
        echo "\n\r" .ucfirst($message);
        ob_flush();
        if($die) return;
    }
    
}