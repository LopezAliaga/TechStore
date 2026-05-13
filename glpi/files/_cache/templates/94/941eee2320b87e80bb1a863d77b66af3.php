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

/* components/dropdown/limit.html.twig */
class __TwigTemplate_64fcd6eff7cbc9fbb277ae3a37560875 extends Template
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
";
        // line 34
        if ( !array_key_exists("additional_params", $context)) {
            // line 35
            echo "   ";
            $context["additional_params"] = "";
        } else {
            // line 37
            echo "   ";
            if (((twig_length_filter($this->env, ($context["additional_params"] ?? null)) > 0) &&  !(is_string($__internal_compile_0 = ($context["additional_params"] ?? null)) && is_string($__internal_compile_1 = "&") && str_starts_with($__internal_compile_0, $__internal_compile_1)))) {
                // line 38
                echo "      ";
                $context["additional_params"] = ("&" . ($context["additional_params"] ?? null));
                // line 39
                echo "   ";
            }
        }
        // line 41
        echo "
";
        // line 42
        if ( !($context["no_onchange"] ?? null)) {
            // line 43
            echo "   ";
            $context["href_separator"] = ((twig_in_filter("?", ($context["href"] ?? null))) ? ("&") : ("?"));
            // line 44
            echo "   ";
            $context["href"] = ((((("location.href='" . ($context["href"] ?? null)) . ($context["href_separator"] ?? null)) . "glpilist_limit='+this.value+'") . ($context["additional_params"] ?? null)) . "'");
            // line 45
            echo "   ";
            if ((array_key_exists("is_tab", $context) && (($context["is_tab"] ?? null) == true))) {
                // line 46
                echo "      ";
                $context["href"] = (("javascript:reloadTab('glpilist_limit='+this.value+'" . ($context["additional_params"] ?? null)) . "');");
                // line 47
                echo "   ";
            }
        }
        // line 49
        echo "
";
        // line 50
        $context["options"] = [];
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(5, 19, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 52
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [$context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(20, 49, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 55
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [$context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(50, 249, 50));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 58
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [$context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(250, 999, 250));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 61
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [$context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1000, 4999, 1000));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 64
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [$context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(5000, 10000, 5000));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 67
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [$context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        $context["options"] = twig_array_merge(($context["options"] ?? null), [9999999]);
        // line 70
        $context["max"] = $this->extensions['Glpi\Application\View\Extension\PhpExtension']->phpConfig("max_input_vars");
        // line 71
        if ((($context["max"] ?? null) > 10)) {
            // line 72
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [(($context["max"] ?? null) - 10)]);
        }
        // line 74
        if (!twig_in_filter($this->extensions['Glpi\Application\View\Extension\SessionExtension']->userPref("list_limit"), ($context["options"] ?? null))) {
            // line 75
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [$this->extensions['Glpi\Application\View\Extension\SessionExtension']->userPref("list_limit")]);
        }
        // line 77
        echo "<select class=\"form-select form-select-sm mx-1 d-inline-block w-auto ";
        echo twig_escape_filter($this->env, ((array_key_exists("select_class", $context)) ? (_twig_default_filter(($context["select_class"] ?? null), "")) : ("")), "html", null, true);
        echo "\"
        ";
        // line 78
        if ( !($context["no_onchange"] ?? null)) {
            echo "onChange=\"";
            echo twig_escape_filter($this->env, ($context["href"] ?? null), "html", null, true);
            echo "\"";
        }
        echo ">
   ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter($this->env, ($context["options"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 80
            echo "      <option value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" ";
            echo ((($context["value"] == $this->extensions['Glpi\Application\View\Extension\SessionExtension']->userPref("list_limit"))) ? ("selected") : (""));
            echo ">
         ";
            // line 81
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
      </option>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        echo "</select>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/dropdown/limit.html.twig";
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
        return array (  197 => 84,  188 => 81,  181 => 80,  177 => 79,  169 => 78,  164 => 77,  160 => 75,  158 => 74,  154 => 72,  152 => 71,  150 => 70,  148 => 69,  141 => 67,  137 => 66,  130 => 64,  126 => 63,  119 => 61,  115 => 60,  108 => 58,  104 => 57,  97 => 55,  93 => 54,  86 => 52,  82 => 51,  80 => 50,  77 => 49,  73 => 47,  70 => 46,  67 => 45,  64 => 44,  61 => 43,  59 => 42,  56 => 41,  52 => 39,  49 => 38,  46 => 37,  42 => 35,  40 => 34,  37 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "components/dropdown/limit.html.twig", "/var/www/html/glpi/templates/components/dropdown/limit.html.twig");
    }
}
