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

/* components/pager.html.twig */
class __TwigTemplate_f98119b8c193e8c10ac31c66e0c1d7ec extends Template
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
            echo "    ";
            $context["additional_params"] = "";
        } else {
            // line 37
            echo "    ";
            if (((twig_length_filter($this->env, ($context["additional_params"] ?? null)) > 0) &&  !(is_string($__internal_compile_0 = ($context["additional_params"] ?? null)) && is_string($__internal_compile_1 = "&") && str_starts_with($__internal_compile_0, $__internal_compile_1)))) {
                // line 38
                echo "        ";
                $context["additional_params"] = ("&" . ($context["additional_params"] ?? null));
                // line 39
                echo "    ";
            }
        }
        // line 41
        echo "
";
        // line 42
        $context["href_separator"] = ((twig_in_filter("?", ($context["href"] ?? null))) ? ("&") : ("?"));
        // line 43
        $context["href"] = (((($context["href"] ?? null) . ($context["href_separator"] ?? null)) . "start=%start%") . ($context["additional_params"] ?? null));
        // line 44
        if ((array_key_exists("is_tab", $context) && (($context["is_tab"] ?? null) == true))) {
            // line 45
            echo "   ";
            $context["href"] = (("javascript:reloadTab('start=%start%" . ($context["additional_params"] ?? null)) . "');");
        }
        // line 47
        if ( !array_key_exists("limit", $context)) {
            // line 48
            echo "    ";
            $context["limit"] = $this->extensions['Glpi\Application\View\Extension\SessionExtension']->userPref("list_limit");
        }
        // line 50
        echo "
";
        // line 51
        $context["forward"] = (($context["start"] ?? null) + ($context["limit"] ?? null));
        // line 52
        $context["end"] = (($context["count"] ?? null) - ($context["limit"] ?? null));
        // line 53
        $context["current_start"] = (($context["start"] ?? null) + 1);
        // line 54
        $context["current_end"] = ((($context["current_start"] ?? null) + ($context["limit"] ?? null)) - 1);
        // line 55
        if ((($context["current_end"] ?? null) > ($context["count"] ?? null))) {
            // line 56
            echo "    ";
            $context["current_end"] = ($context["count"] ?? null);
        }
        // line 58
        echo "
";
        // line 59
        $context["back"] = (($context["start"] ?? null) - ($context["limit"] ?? null));
        // line 60
        if (((($context["current_start"] ?? null) - ($context["list_limit"] ?? null)) <= 0)) {
            // line 61
            echo "   ";
            $context["back"] = 0;
        }
        // line 63
        echo "
";
        // line 64
        $context["nb_pages"] = twig_round((($context["count"] ?? null) / ($context["limit"] ?? null)), 0, "ceil");
        // line 65
        $context["current_page"] = (twig_round(((($context["current_start"] ?? null) - 1) / ($context["limit"] ?? null)), 0, "ceil") + 1);
        // line 66
        echo "
";
        // line 68
        $context["adjacents"] = 2;
        // line 69
        $context["skip_adjacents"] = false;
        // line 70
        echo "
<div class=\"flex-grow-1 d-flex flex-wrap flex-md-nowrap  align-items-center justify-content-between mb-2 search-pager\">
    ";
        // line 72
        $context["limitdropdown"] = twig_include($this->env, $context, "components/dropdown/limit.html.twig", ["no_onchange" => ((        // line 73
array_key_exists("fluid_search", $context)) ? (_twig_default_filter(($context["fluid_search"] ?? null), false)) : (false)), "select_class" => "search-limit-dropdown", "href" => twig_replace_filter(        // line 75
($context["href"] ?? null), ["%start%" => ($context["start"] ?? null)])]);
        // line 77
        echo "    <span class=\"search-limit d-none d-md-block\">
        ";
        // line 78
        echo twig_sprintf(__("%s rows / page"), ($context["limitdropdown"] ?? null));
        echo "
    </span>
    <span class=\"search-limit d-block d-md-none\">
        ";
        // line 81
        echo ($context["limitdropdown"] ?? null);
        echo "
    </span>
    <p class=\"m-0 text-muted d-none d-md-block page-infos\">
        ";
        // line 84
        echo twig_escape_filter($this->env, twig_sprintf(__("Showing %s to %s of %s rows"), ($context["current_start"] ?? null), ($context["current_end"] ?? null), ($context["count"] ?? null)), "html", null, true);
        echo "
    </p>
    <p class=\"m-0 text-muted d-block d-md-none text-nowrap ms-2 page-infos\">
        ";
        // line 87
        echo twig_escape_filter($this->env, twig_sprintf(__("%s-%s/%s"), ($context["current_start"] ?? null), ($context["current_end"] ?? null), ($context["count"] ?? null)), "html", null, true);
        echo "
    </p>

    <ul class=\"pagination m-0 mt-sm-2 mt-md-0\">
        ";
        // line 91
        if ((($context["nb_pages"] ?? null) > 1)) {
            // line 92
            echo "            ";
            $context["is_first_page"] = (($context["start"] ?? null) == 0);
            // line 93
            echo "            ";
            $context["is_last_page"] = (($context["forward"] ?? null) >= ($context["count"] ?? null));
            // line 94
            echo "
            <li class=\"page-item ";
            // line 95
            if (($context["is_first_page"] ?? null)) {
                echo "disabled";
            }
            echo "\">
                <a class=\"page-link page-link-start\" href=\"";
            // line 96
            echo twig_escape_filter($this->env, twig_replace_filter(($context["href"] ?? null), ["%start%" => 0]), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, __("Start"), "html", null, true);
            echo "\" data-start=\"0\" ";
            if (($context["is_first_page"] ?? null)) {
                echo "aria-disabled=\"true\"";
            }
            echo ">
                    <i class=\"ti ti-chevrons-left\"></i>
                </a>
            </li>
            <li class=\"page-item ";
            // line 100
            if (($context["is_first_page"] ?? null)) {
                echo "disabled";
            }
            echo "\">
                <a class=\"page-link page-link-prev\" href=\"";
            // line 101
            echo twig_escape_filter($this->env, twig_replace_filter(($context["href"] ?? null), ["%start%" => ($context["back"] ?? null)]), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, __("Previous"), "html", null, true);
            echo "\" data-start=\"";
            echo twig_escape_filter($this->env, ($context["back"] ?? null), "html", null, true);
            echo "\" ";
            if (($context["is_first_page"] ?? null)) {
                echo "aria-disabled=\"true\"";
            }
            echo ">
                    <i class=\"ti ti-chevron-left\"></i>
                </a>
            </li>
            ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, ($context["nb_pages"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 106
                echo "                ";
                if ((((($context["current_page"] ?? null) - ($context["adjacents"] ?? null)) <= $context["page"]) && ((($context["current_page"] ?? null) + ($context["adjacents"] ?? null)) >= $context["page"]))) {
                    // line 107
                    echo "                    ";
                    $context["page_start"] = (($context["page"] - 1) * ($context["limit"] ?? null));
                    // line 108
                    echo "                    <li class=\"d-none d-sm-block page-item ";
                    if (($context["page"] == ($context["current_page"] ?? null))) {
                        echo "active selected";
                    }
                    echo "\">
                    <a class=\"page-link page-link-num\" href=\"";
                    // line 109
                    echo twig_escape_filter($this->env, twig_replace_filter(($context["href"] ?? null), ["%start%" => ($context["page_start"] ?? null)]), "html", null, true);
                    echo "\" data-start=\"";
                    echo twig_escape_filter($this->env, ($context["page_start"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                    echo "</a>
                    </li>
                    ";
                    // line 111
                    if (((($context["current_page"] ?? null) + ($context["adjacents"] ?? null)) == $context["page"])) {
                        // line 112
                        echo "                    ";
                        $context["skip_adjacents"] = false;
                        // line 113
                        echo "                    ";
                    }
                    // line 114
                    echo "                ";
                } elseif ((($context["skip_adjacents"] ?? null) == false)) {
                    // line 115
                    echo "                    ";
                    $context["skip_adjacents"] = true;
                    // line 116
                    echo "                    <li class=\"d-none d-sm-block page-item disabled\">
                    <a class=\"page-link\" href=\"#\" aria-disabled=\"true\">...</a>
                    </li>
                ";
                }
                // line 120
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "
            <li class=\"page-item ";
            // line 122
            if (($context["is_last_page"] ?? null)) {
                echo "disabled";
            }
            echo "\">
                <a class=\"page-link page-link-next\" href=\"";
            // line 123
            echo twig_escape_filter($this->env, twig_replace_filter(($context["href"] ?? null), ["%start%" => ($context["forward"] ?? null)]), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, __("Next"), "html", null, true);
            echo "\" data-start=\"";
            echo twig_escape_filter($this->env, ($context["forward"] ?? null), "html", null, true);
            echo "\" ";
            if (($context["is_last_page"] ?? null)) {
                echo "aria-disabled=\"true\"";
            }
            echo ">
                    <i class=\"ti ti-chevron-right\"></i>
                </a>
            </li>
            <li class=\"page-item ";
            // line 127
            if (($context["is_last_page"] ?? null)) {
                echo "disabled";
            }
            echo "\">
                <a class=\"page-link page-link-last\" href=\"";
            // line 128
            echo twig_escape_filter($this->env, twig_replace_filter(($context["href"] ?? null), ["%start%" => ($context["end"] ?? null)]), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, __("End"), "html", null, true);
            echo "\" data-start=\"";
            echo twig_escape_filter($this->env, ($context["end"] ?? null), "html", null, true);
            echo "\" ";
            if (($context["is_last_page"] ?? null)) {
                echo "aria-disabled=\"true\"";
            }
            echo ">
                    <i class=\"ti ti-chevrons-right\"></i>
                </a>
            </li>
        ";
        }
        // line 133
        echo "    </ul>
</div>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/pager.html.twig";
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
        return array (  302 => 133,  286 => 128,  280 => 127,  265 => 123,  259 => 122,  256 => 121,  250 => 120,  244 => 116,  241 => 115,  238 => 114,  235 => 113,  232 => 112,  230 => 111,  221 => 109,  214 => 108,  211 => 107,  208 => 106,  204 => 105,  189 => 101,  183 => 100,  170 => 96,  164 => 95,  161 => 94,  158 => 93,  155 => 92,  153 => 91,  146 => 87,  140 => 84,  134 => 81,  128 => 78,  125 => 77,  123 => 75,  122 => 73,  121 => 72,  117 => 70,  115 => 69,  113 => 68,  110 => 66,  108 => 65,  106 => 64,  103 => 63,  99 => 61,  97 => 60,  95 => 59,  92 => 58,  88 => 56,  86 => 55,  84 => 54,  82 => 53,  80 => 52,  78 => 51,  75 => 50,  71 => 48,  69 => 47,  65 => 45,  63 => 44,  61 => 43,  59 => 42,  56 => 41,  52 => 39,  49 => 38,  46 => 37,  42 => 35,  40 => 34,  37 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "components/pager.html.twig", "/var/www/html/glpi/templates/components/pager.html.twig");
    }
}
