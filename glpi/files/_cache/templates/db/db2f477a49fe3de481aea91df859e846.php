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

/* layout/parts/head.html.twig */
class __TwigTemplate_395b11532d054747bdfb8d4bf7ae1488 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "
<!DOCTYPE html>
<html lang=\"";
        // line 35
        echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
        echo "\" ";
        if (($context["high_contrast"] ?? null)) {
            echo "data-high-contrast=\"1\"";
        }
        // line 36
        echo "      ";
        ((array_key_exists("glpi_request_id", $context)) ? (print (twig_escape_filter($this->env, ("data-glpi-request-id=" . ($context["glpi_request_id"] ?? null)), "html", null, true))) : (print ("")));
        echo ">
<head>
   <title>";
        // line 38
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo " - GLPI</title>

   <meta charset=\"utf-8\" />

   ";
        // line 43
        echo "   <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />

   ";
        // line 46
        echo "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />

   ";
        // line 49
        echo "   <meta name=\"robots\" content=\"noindex, nofollow\" />

    ";
        // line 52
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["custom_header_tags"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["header_tag"]) {
            // line 53
            echo "        <";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["header_tag"], "tag", [], "any", false, false, false, 53), "html", null, true);
            echo " ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["header_tag"], "properties", [], "any", false, false, false, 53));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "/>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['header_tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "
   <meta property=\"glpi:csrf_token\" content=\"";
        // line 56
        echo twig_escape_filter($this->env, Session::getNewCSRFToken(true), "html", null, true);
        echo "\" />

   ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["css_files"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["css_file"]) {
            // line 59
            echo "      <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\FrontEndAssetsExtension']->cssPath(twig_get_attribute($this->env, $this->source, $context["css_file"], "path", [], "any", false, false, false, 59), (((twig_get_attribute($this->env, $this->source, $context["css_file"], "options", [], "any", true, true, false, 59) &&  !(null === twig_get_attribute($this->env, $this->source, $context["css_file"], "options", [], "any", false, false, false, 59)))) ? (twig_get_attribute($this->env, $this->source, $context["css_file"], "options", [], "any", false, false, false, 59)) : ([]))), "html", null, true);
            echo "\" />
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['css_file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "
   ";
        // line 62
        echo $this->extensions['Glpi\Application\View\Extension\FrontEndAssetsExtension']->customCss();
        echo "

   <link rel=\"shortcut icon\" type=\"images/x-icon\" href=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\FrontEndAssetsExtension']->assetPath("/pics/favicon.ico"), "html", null, true);
        echo "\" />

   ";
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["js_files"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["js_file"]) {
            // line 67
            echo "      <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\FrontEndAssetsExtension']->jsPath(twig_get_attribute($this->env, $this->source, $context["js_file"], "path", [], "any", false, false, false, 67), (((twig_get_attribute($this->env, $this->source, $context["js_file"], "options", [], "any", true, true, false, 67) &&  !(null === twig_get_attribute($this->env, $this->source, $context["js_file"], "options", [], "any", false, false, false, 67)))) ? (twig_get_attribute($this->env, $this->source, $context["js_file"], "options", [], "any", false, false, false, 67)) : ([]))), "html", null, true);
            echo "\"></script>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['js_file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "
   ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["js_modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["js_file"]) {
            // line 71
            echo "      <script type=\"module\" src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\FrontEndAssetsExtension']->jsPath(twig_get_attribute($this->env, $this->source, $context["js_file"], "path", [], "any", false, false, false, 71), (((twig_get_attribute($this->env, $this->source, $context["js_file"], "options", [], "any", true, true, false, 71) &&  !(null === twig_get_attribute($this->env, $this->source, $context["js_file"], "options", [], "any", false, false, false, 71)))) ? (twig_get_attribute($this->env, $this->source, $context["js_file"], "options", [], "any", false, false, false, 71)) : ([]))), "html", null, true);
            echo "\"></script>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['js_file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "
   ";
        // line 74
        echo $this->extensions['Glpi\Application\View\Extension\FrontEndAssetsExtension']->localesJs();
        echo "
</head>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "layout/parts/head.html.twig";
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
        return array (  164 => 74,  161 => 73,  152 => 71,  148 => 70,  145 => 69,  136 => 67,  132 => 66,  127 => 64,  122 => 62,  119 => 61,  110 => 59,  106 => 58,  101 => 56,  98 => 55,  77 => 53,  72 => 52,  68 => 49,  64 => 46,  60 => 43,  53 => 38,  47 => 36,  41 => 35,  37 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout/parts/head.html.twig", "/var/www/html/glpi/templates/layout/parts/head.html.twig");
    }
}
