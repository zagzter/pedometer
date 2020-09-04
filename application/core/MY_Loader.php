<?php

class MY_Loader extends CI_Loader {

    public function template($template_name, $vars = array(), $return = TRUE) {

        $content = $this->view('includes/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('includes/footer', $vars, $return);

        echo $content;

    }

}


?>