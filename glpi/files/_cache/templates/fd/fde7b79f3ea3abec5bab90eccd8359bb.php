<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout/page_card_notlogged.html.twig */
class __TwigTemplate_c669b31ee34dfdc3f76045b4109196d0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content_block' => [$this, 'block_content_block'],
            'footer_block' => [$this, 'block_footer_block'],
            'javascript_block' => [$this, 'block_javascript_block'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "
";
        // line 34
        $context["theme"] = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("palette");
        // line 35
        if ( !array_key_exists("css_files", $context)) {
            // line 36
            echo "   ";
            $context["css_files"] = [["path" => "public/lib/base.css"], ["path" => (("css/palettes/" .             // line 38
($context["theme"] ?? null)) . ".scss")]];
            // line 40
            echo "   ";
        }
        // line 42
        if ( !array_key_exists("js_files", $context)) {
            // line 43
            echo "   ";
            $context["js_files"] = [["path" => "public/lib/base.js"], ["path" => "js/common.js"], ["path" => "public/lib/fuzzy.js"]];
        }
        // line 49
        echo "
";
        // line 50
        echo twig_include($this->env, $context, "layout/parts/head.html.twig");
        echo "
<body class=\"welcome-anonymous\">
   <div class=\"page-anonymous\">
      <div class=\"flex-fill d-flex flex-column justify-content-center py-4 mt-4\">
         ";
        // line 54
        $context["style"] = null;
        // line 55
        echo "         ";
        if (array_key_exists("card_md_width", $context)) {
            // line 56
            echo "            ";
            $context["style"] = "max-width: 40rem";
            // line 57
            echo "         ";
        }
        // line 58
        echo "         ";
        if (array_key_exists("card_bg_width", $context)) {
            // line 59
            echo "            ";
            $context["style"] = "max-width: 60rem";
            // line 60
            echo "         ";
        }
        // line 61
        echo "
         <div class=\"container-tight py-6\" ";
        // line 62
        if ( !(null === ($context["style"] ?? null))) {
            echo "style=\"";
            echo twig_escape_filter($this->env, ($context["style"] ?? null), "html", null, true);
            echo "\"";
        }
        echo ">
            <div class=\"text-center\">
               <div class=\"col-md\">
                  <span class=\"glpi-logo mb-4\" title=\"GLPI\"></span>
               </div>
            </div>
            <div class=\"card card-md\">
               <div class=\"card-body\">
               ";
        // line 70
        $this->displayBlock('content_block', $context, $blocks);
        // line 71
        echo "               </div>
            </div>

            <div class=\"text-center text-muted mt-3\">
               ";
        // line 75
        $this->displayBlock('footer_block', $context, $blocks);
        // line 76
        echo "            </div>
         </div>
      </div>
   </div>

   ";
        // line 81
        $this->displayBlock('javascript_block', $context, $blocks);
        // line 82
        echo "</body>
</html>
";
    }

    // line 70
    public function block_content_block($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 75
    public function block_footer_block($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 81
    public function block_javascript_block($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "layout/page_card_notlogged.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  145 => 81,  139 => 75,  133 => 70,  127 => 82,  125 => 81,  118 => 76,  116 => 75,  110 => 71,  108 => 70,  93 => 62,  90 => 61,  87 => 60,  84 => 59,  81 => 58,  78 => 57,  75 => 56,  72 => 55,  70 => 54,  63 => 50,  60 => 49,  56 => 43,  54 => 42,  51 => 40,  49 => 38,  47 => 36,  45 => 35,  43 => 34,  40 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout/page_card_notlogged.html.twig", "/var/www/html/glpi/templates/layout/page_card_notlogged.html.twig");
    }
}
