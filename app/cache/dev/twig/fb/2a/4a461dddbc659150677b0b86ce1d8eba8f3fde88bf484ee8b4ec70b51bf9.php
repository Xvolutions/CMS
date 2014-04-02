<?php

/* ClevertiCTILoginBundle::login_form.html.twig */
class __TwigTemplate_fb2a4a461dddbc659150677b0b86ce1d8eba8f3fde88bf484ee8b4ec70b51bf9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ClevertiCTILoginBundle::template.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ClevertiCTILoginBundle::template.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"content-center\">
        <h2>Login</h2>


        <form method=\"post\" action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getUrl("cleverti_cti_login_homepage");
        echo "\" name=\"login\" id=\"loginForm\" class=\"form-horizontal\">
            <div class=\"control-group\" style=\"margin-bottom: 9px;\">
                <label class=\"control-label\" for=\"id1\"><i class=\"icon-user\"></i> Username</label>
                <div class=\"controls\">
                    <input value=\"\" size=\"10\" name=\"Login\" id=\"id1\" placeholder=\"Username\" type=\"text\">
                </div>
            </div>
            <div class=\"control-group\" style=\"margin-bottom: 9px;\">
                <label class=\"control-label\" for=\"id2\"><i class=\"icon-lock\"></i> Password</label>
                <div class=\"controls\">
                    <input size=\"10\" name=\"Password\" id=\"id2\" placeholder=\"Password\" type=\"password\">
                </div>
            </div>

            <div class=\"control-group\">
                <div class=\"controls\">
                    <label class=\"checkbox\"><input name=\"Cookie\" id=\"id3\" type=\"checkbox\">Stay signed in</label>
                    <button type=\"submit\" name=\"LoginButton\" class=\"btn\" style=\"margin-top: 25px;\"><i class=\"icon-signin\"></i> Login</button>
                </div>
            </div>

            <input name=\"RedirectURI\" value=\"\" type=\"hidden\">

            <div class=\"control-group\" style=\"margin-top:40px\">
                <div class=\"controls\">
                    <a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getUrl("cleverti_cti_login_recover");
        echo "\">Forgot your password?</a>
                </div>
            </div>

        </form>


        <script type=\"text/javascript\">
            \$(document).ready(function() {
                \$(\"#id1\").focus();
            });
        </script>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ClevertiCTILoginBundle::login_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 33,  37 => 8,  31 => 4,  28 => 3,);
    }
}
