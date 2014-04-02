<?php

/* ClevertiCTILoginBundle::template.html.twig */
class __TwigTemplate_23a7ef2ff75ab2abf7508ce46b1dd14fa9cea90c6dc85ab6c9e68fc48e68368d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]> <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>    <html class=\"no-js lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>    <html class=\"no-js lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><html class=\"no-js\" lang=\"lang=\"en-GB\"><![endif]-->
<html>
    <head>
        <meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\">
        <meta charset=\"utf-8\">
        <title>Cleverti CTI-SRV7-ACS-VM</title>
        <meta name=\"viewport\" content=\"width=device-width\">
        
        <link rel=\"Shortcut icon\" href=\"http://intra.cleverti/extension/clti_intranet/design/clti_intranet/images/favicon.ico\" type=\"image/x-icon\">

        ";
        // line 15
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d0e5d96_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d0e5d96_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/d0e5d96_css_1.css");
            // line 19
            echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
        ";
            // asset "d0e5d96_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d0e5d96_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/d0e5d96_802d785ddb42ce4d12cf76900c553b40_all_2.css");
            echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
        ";
        } else {
            // asset "d0e5d96"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d0e5d96") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/d0e5d96.css");
            echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\">
        ";
        }
        unset($context["asset_url"]);
        // line 21
        echo "
    </head>
    <body>
        <div class=\"wrapper\">
            <div class=\"bordertop\"></div>

            <div class=\"container\" role=\"main\">
                <header class=\"row-fluid\">
                    <a href=\"http://intra.cleverti/\">
                        ";
        // line 30
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "e513b52_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e513b52_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/e513b52_cleverti_logo_1.png");
            // line 31
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" title=\"cleverti CTI-SRV7-ACS-VM\" alt=\"cleverti CTI-SRV7-ACS-VM\" style=\"float:left\"/>
                        ";
        } else {
            // asset "e513b52"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e513b52") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/e513b52.png");
            echo "                            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" title=\"cleverti CTI-SRV7-ACS-VM\" alt=\"cleverti CTI-SRV7-ACS-VM\" style=\"float:left\"/>
                        ";
        }
        unset($context["asset_url"]);
        // line 33
        echo "                    </a>
                    <h1>cleverti <em>CTI-SRV7-ACS-VM</em></h1>
                </header>
                <div id=\"main-content\" class=\"row-fluid\">
                    ";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 38
        echo "                </div>

                <script type=\"text/javascript\">
                    \$(\"#loginForm\").submit(function(e) {
                        if (\$(\"#id1\").val().indexOf(\"@\") == -1) {
                            alert(\"Please use a valid email address\");
                            e.preventDefault();
                        }
                    });
                </script>
            </div>
        </div>
                
        <div class=\"container\">
            <footer id=\"main-footer\" class=\"row-fluid\">
                <div class=\"span6\" style=\"float:left\">
                    <p class=\"hidden-phone\">
                        ";
        // line 55
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0e6766e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0e6766e_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/0e6766e_phone_small_1.png");
            // line 56
            echo "                            <img rel=\"shortcut icon\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
                        ";
        } else {
            // asset "0e6766e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0e6766e") : $this->env->getExtension('assets')->getAssetUrl("_controller/images/0e6766e.png");
            echo "                            <img rel=\"shortcut icon\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
                        ";
        }
        unset($context["asset_url"]);
        // line 58
        echo "                        Mobile &amp; Tablet Ready
                    </p>
                </div>
                <div class=\"span6\">
                    <p>© cleverti 2014</p>
                </div>
            </footer>
        </div>

        ";
        // line 67
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f1eaf3b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f1eaf3b_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/f1eaf3b_ac4a5b4bd2f1245ca86c631313d42458_1.js");
            // line 70
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "f1eaf3b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f1eaf3b") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/f1eaf3b.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 72
        echo "
    </body>
</html>";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ClevertiCTILoginBundle::template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 37,  163 => 72,  149 => 70,  145 => 67,  134 => 58,  120 => 56,  116 => 55,  97 => 38,  95 => 37,  89 => 33,  75 => 31,  71 => 30,  60 => 21,  40 => 19,  36 => 15,  20 => 1,  65 => 33,  37 => 8,  31 => 4,  28 => 3,);
    }
}
