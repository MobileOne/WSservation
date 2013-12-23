<?php

/* @Doctrine/Collector/db.html.twig */
class __TwigTemplate_218b2549c8abec8653bb93ca19120b13e0323dfadeaac22e0939c7f42fbee09a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
            'queries' => array($this, 'block_queries'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "isXmlHttpRequest")) ? ("WebProfilerBundle:Profiler:ajax_layout.html.twig") : ("WebProfilerBundle:Profiler:layout.html.twig")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        <img width=\"20\" height=\"28\" alt=\"Database\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAcCAYAAABh2p9gAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAQRJREFUeNpi/P//PwM1ARMDlcGogZQDlpMnT7pxc3NbA9nhQKxOpL5rQLwJiPeBsI6Ozl+YBOOOHTv+AOllQNwtLS39F2owKYZ/gRq8G4i3ggxEToggWzvc3d2Pk+1lNL4fFAs6ODi8JzdS7mMRVyDVoAMHDsANdAPiOCC+jCQvQKqBQB/BDbwBxK5AHA3E/kB8nKJkA8TMQBwLxaBIKQbi70AvTADSBiSadwFXpCikpKQU8PDwkGTaly9fHFigkaKIJid4584dkiMFFI6jkTJII0WVmpHCAixZQEXWYhDeuXMnyLsVlEQKI45qFBQZ8eRECi4DBaAlDqle/8A48ip6gAADANdQY88Uc0oGAAAAAElFTkSuQmCC\" />
        <span class=\"sf-toolbar-status";
        // line 6
        if ((50 < $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount"))) {
            echo " sf-toolbar-status-yellow";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount"), "html", null, true);
        echo "</span>
        ";
        // line 7
        if (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount") > 0)) {
            // line 8
            echo "            <span class=\"sf-toolbar-info-piece-additional-detail\">in ";
            echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "time") * 1000)), "html", null, true);
            echo " ms</span>
        ";
        }
        // line 10
        echo "        ";
        if (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "invalidEntityCount") > 0)) {
            // line 11
            echo "            <span class=\"sf-toolbar-info-piece-additional sf-toolbar-status sf-toolbar-status-red\"> </span>
        ";
        }
        // line 13
        echo "    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 14
        echo "    ";
        ob_start();
        // line 15
        echo "        <div class=\"sf-toolbar-info-piece\">
            <b>DB Queries</b>
            <span>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount"), "html", null, true);
        echo "</span>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <b>Query time</b>
            <span>";
        // line 21
        echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "time") * 1000)), "html", null, true);
        echo " ms</span>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <b>Invalid entities</b>
            <span class=\"sf-toolbar-status sf-toolbar-status-";
        // line 25
        echo ((($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "invalidEntityCount") > 0)) ? ("red") : ("green"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "invalidEntityCount"), "html", null, true);
        echo "</span>
        </div>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 28
        echo "    ";
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => (isset($context["profiler_url"]) ? $context["profiler_url"] : $this->getContext($context, "profiler_url")))));
    }

    // line 31
    public function block_menu($context, array $blocks = array())
    {
        // line 32
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAcCAYAAAB/E6/TAAABLUlEQVR42u3TP0vDQBiA8UK/gDiLzi0IhU4OEunk5OQUAhGSOBUCzqWfIKSzX8DRySF0URCcMjWLIJjFD9Cpk/D6HITecEPUuzhIAz8CIdyTP/f2iqI4qaqqDx8l5Ic2uIeP/bquezCokOAFF+oCN3t4gPzSEjc4NEPaCldQbzjELTYW0RJzHDchwwem+ons6ZBpLSJ7nueJC22h0V+FzmwWV0ee59vQNV67CGVZJmEYbkNjfpY6X6I0Qo4/3RMmTdDDspuQVsJvgkP3IdMbIkIjLPBoadG2646iKJI0Ta2wxm6OdnP0/Tk6DYJgHcfxpw21RtscDTDDnaVZ26474GkkSRIrrPEv5sgMTfHe+cA2O6wPH6vOBpYQNALneHb96XTEDI6dzpEZ0VzO0Rf3pP5LMLI4tAAAAABJRU5ErkJggg==\" alt=\"\" /></span>
    <strong>Doctrine</strong>
    <span class=\"count\">
        <span>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "querycount"), "html", null, true);
        echo "</span>
        <span>";
        // line 37
        echo twig_escape_filter($this->env, sprintf("%0.0f", ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "time") * 1000)), "html", null, true);
        echo " ms</span>
    </span>
</span>
";
    }

    // line 42
    public function block_panel($context, array $blocks = array())
    {
        // line 43
        echo "    ";
        if (("explain" == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
            // line 44
            echo "        ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("DoctrineBundle:Profiler:explain", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "panel" => "db", "connectionName" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "query"), "get", array(0 => "connection"), "method"), "query" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "query"), "get", array(0 => "query"), "method"))));
            // line 49
            echo "
    ";
        } else {
            // line 51
            echo "        ";
            $this->displayBlock("queries", $context, $blocks);
            echo "
    ";
        }
    }

    // line 55
    public function block_queries($context, array $blocks = array())
    {
        // line 56
        echo "    <h2>Queries</h2>

    ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "queries"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["connection"] => $context["queries"]) {
            // line 59
            echo "        <h3>Connection <em>";
            echo twig_escape_filter($this->env, (isset($context["connection"]) ? $context["connection"] : $this->getContext($context, "connection")), "html", null, true);
            echo "</em></h3>
        ";
            // line 60
            if (twig_test_empty((isset($context["queries"]) ? $context["queries"] : $this->getContext($context, "queries")))) {
                // line 61
                echo "            <p>
                <em>No queries.</em>
            </p>
        ";
            } else {
                // line 65
                echo "            <p>
                <button type=\"button\" class=\"sf-button\" onclick=\"expandAllQueries(this);\" data-action=\"expand\">
                    <span class=\"border-l\">
                        <span class=\"border-r\">
                            <span class=\"btn-bg\">Expand all queries</span>
                        </span>
                    </span>
                </button>
            </p>
            <ul class=\"alt\" id=\"queriesPlaceholder-";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
                echo "\">
                ";
                // line 75
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["queries"]) ? $context["queries"] : $this->getContext($context, "queries")));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["i"] => $context["query"]) {
                    // line 76
                    echo "                    <li class=\"";
                    echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
                    echo "\" data-extra-info=\"";
                    echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "executionMS") * 1000)), "html", null, true);
                    echo "\" data-target-id=\"";
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\">
                        <div style=\"margin-top: 4px\" id=\"queryNo-";
                    // line 77
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                    echo "\">
                            <div class=\"query-section\" data-state=\"collapsed\" onclick=\"return expandQuery(this);\" title=\"Expand query\" data-target-id=\"code-";
                    // line 78
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                    echo "\" style=\"cursor: pointer;\">
                                <img alt=\"+\" src=\"";
                    // line 79
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
                    echo "\" style=\"display: inline;\" />
                                <img alt=\"-\" src=\"";
                    // line 80
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
                    echo "\" style=\"display: none;\" />
                                <span style=\"display: none\">Shrink query</span>
                                <span id=\"smallcode-";
                    // line 82
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                    echo "\">
                                    ";
                    // line 83
                    echo $this->env->getExtension('doctrine_extension')->minifyQuery($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "sql"));
                    echo "
                                </span>
                            </div>
                            <code id=\"code-";
                    // line 86
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                    echo "\">
                                ";
                    // line 87
                    echo SqlFormatter::format($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "sql"), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"));
                    echo "
                            </code>
                            <span id=\"original-query-";
                    // line 89
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                    echo "\" style=\"display: none;\">
                                ";
                    // line 90
                    echo $this->env->getExtension('doctrine_extension')->replaceQueryParameters($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "sql"), $this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "params"));
                    echo "
                            </span>
                            <small>
                                <strong>Parameters</strong>: ";
                    // line 93
                    echo twig_escape_filter($this->env, $this->env->getExtension('yaml')->encode($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "params")), "html", null, true);
                    echo " <br />
                                [<span id=\"expandParams-";
                    // line 94
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                    echo "\" onclick=\"javascript:toggleRunnableQuery(this);\" target-data-id=\"original-query-";
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                    echo "\" style=\"cursor: pointer;\">Display runnable query</span>]<br/>
                                <strong>Time</strong>: ";
                    // line 95
                    echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "executionMS") * 1000)), "html", null, true);
                    echo " ms
                            </small>
                            ";
                    // line 97
                    if ($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "explainable")) {
                        // line 98
                        echo "                                [<a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("panel" => "db", "token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "page" => "explain", "connection" => (isset($context["connection"]) ? $context["connection"] : $this->getContext($context, "connection")), "query" => (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")))), "html", null, true);
                        echo "\" onclick=\"return explain(this);\" style=\"text-decoration: none;\" title=\"Explains the query\" data-target-id=\"explain-";
                        echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                        echo "\" >
                                    <img alt=\"+\" src=\"";
                        // line 99
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
                        echo "\" style=\"display: inline; width: 12px; height: 12px;\" />
                                    <img alt=\"-\" src=\"";
                        // line 100
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
                        echo "\" style=\"display: none; width: 12px; height: 12px;\" />
                                    <span style=\"vertical-align:top\">Explain query</span>
                                </a>]
                            ";
                    } else {
                        // line 104
                        echo "                                This query cannot be explained
                            ";
                    }
                    // line 106
                    echo "                        </div>
                        ";
                    // line 107
                    if ($this->getAttribute((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "explainable")) {
                        // line 108
                        echo "                        <div id=\"explain-";
                        echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "parent"), "loop"), "index"), "html", null, true);
                        echo "\" class=\"loading\"></div>
                        ";
                    }
                    // line 110
                    echo "                    </li>
                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['i'], $context['query'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 112
                echo "            </ul>
        ";
            }
            // line 114
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['connection'], $context['queries'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo "
    <h2>Database Connections</h2>

    ";
        // line 118
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "connections")) {
            // line 119
            echo "        ";
            $this->env->loadTemplate("WebProfilerBundle:Profiler:table.html.twig")->display(array("data" => $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "connections")));
            // line 120
            echo "    ";
        } else {
            // line 121
            echo "        <p>
            <em>No connections.</em>
        </p>
    ";
        }
        // line 125
        echo "
    <h2>Entity Managers</h2>

    ";
        // line 128
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "managers")) {
            // line 129
            echo "        ";
            $this->env->loadTemplate("WebProfilerBundle:Profiler:table.html.twig")->display(array("data" => $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "managers")));
            // line 130
            echo "    ";
        } else {
            // line 131
            echo "        <p>
            <em>No entity managers.</em>
        </p>
    ";
        }
        // line 135
        echo "
    <h2>Mapping</h2>

    ";
        // line 138
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "entities"));
        foreach ($context['_seq'] as $context["manager"] => $context["classes"]) {
            // line 139
            echo "        <h3>Manager <em>";
            echo twig_escape_filter($this->env, (isset($context["manager"]) ? $context["manager"] : $this->getContext($context, "manager")), "html", null, true);
            echo "</em></h3>
        ";
            // line 140
            if (twig_test_empty((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")))) {
                // line 141
                echo "            <p><em>No loaded entities.</em></p>
        ";
            } else {
                // line 143
                echo "            <table>
                <thead>
                <tr>
                    <th scope=\"col\">Class</th>
                    <th scope=\"col\">Mapping errors</th>
                </tr>
                </thead>
                <tbody>
                ";
                // line 151
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")));
                foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
                    // line 152
                    echo "                    <tr>
                        <td>";
                    // line 153
                    echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
                    echo "</td>
                        <td>
                            ";
                    // line 155
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "mappingErrors", array(), "any", false, true), (isset($context["manager"]) ? $context["manager"] : $this->getContext($context, "manager")), array(), "array", false, true), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), array(), "array", true, true)) {
                        // line 156
                        echo "                                <ul>
                                    ";
                        // line 157
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "mappingErrors"), (isset($context["manager"]) ? $context["manager"] : $this->getContext($context, "manager")), array(), "array"), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                            // line 158
                            echo "                                        <li>";
                            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                            echo "</li>
                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 160
                        echo "                                </ul>
                            ";
                    } else {
                        // line 162
                        echo "                                Valid
                            ";
                    }
                    // line 164
                    echo "                        </td>
                    </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 167
                echo "                </tbody>
            </table>
        ";
            }
            // line 170
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['manager'], $context['classes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "
    <script type=\"text/javascript\">//<![CDATA[
        function explain(link) {
            \"use strict\";

            var imgs = link.children,
                target = link.getAttribute('data-target-id');

            Sfjs.toggle(target, imgs[0], imgs[1])
                .load(
                    target,
                    link.href,
                    null,
                    function(xhr, el) {
                        el.innerHTML = 'An error occurred while loading the details';
                        Sfjs.removeClass(el, 'loading');
                    }
                );

            return false;
        }

        function expandAllQueries(button) {
            var queries = document.getElementsByClassName('query-section'),
                i = queries.length,
                action = button.getAttribute('data-action');

            if (action == 'expand') {
                button.getElementsByClassName('btn-bg')[0].innerHTML = 'Collapse all queries';

                while (i--) {
                    if (queries[i].getAttribute('data-state') == 'collapsed') {
                        expandQuery(queries[i]);
                    }
                }
            } else {
                button.getElementsByClassName('btn-bg')[0].innerHTML = 'Expand all queries';

                while (i--) {
                    if (queries[i].getAttribute('data-state') == 'expanded') {
                        expandQuery(queries[i]);
                    }
                }
            }

            button.setAttribute('data-action', action == 'expand' ? 'collapse' : 'expand');
        }

        function expandQuery(link) {
            var sections = link.children,
                target = link.getAttribute('data-target-id'),
                targetId = target.replace('code', ''),
                queriesParameters = document.getElementById('original-query' + targetId);

            if (queriesParameters.style.display != 'none') {
                queriesParameters.style.display = 'none';
                document.getElementById('small' + target).style.display = 'inline';
                document.getElementById('expandParams' + targetId).innerHTML = 'Display runnable query';
            }

            if (document.getElementById('small' + target).style.display != 'none') {
                document.getElementById('small' + target).style.display = 'none';
                document.getElementById(target).style.display = 'inline';

                sections[0].style.display = 'none';
                sections[1].style.display = 'inline';
                sections[2].style.display = 'inline';

                link.setAttribute('data-state', 'expanded');
            } else {
                document.getElementById('small' + target).style.display = 'inline';
                document.getElementById(target).style.display = 'none';

                sections[0].style.display = 'inline';
                sections[1].style.display = 'none';
                sections[2].style.display = 'none';

                link.setAttribute('data-state', 'collapsed');
            }

            return false;
        }

        function toggleRunnableQuery(target) {
            var targetId = target.getAttribute('target-data-id').replace('original-query', ''),
                targetElement = document.getElementById(target.getAttribute('target-data-id')),
                elem;

            if (targetElement.style.display != 'block') {
                targetElement.style.display = 'block';
                target.innerHTML = 'Hide runnable query';

                document.getElementById('smallcode' + targetId).style.display = 'none';
                document.getElementById('code' + targetId).style.display = 'none';

                elem = document.getElementById('code' + targetId).parentElement.children[0];

                elem.children[0].style.display = 'inline';
                elem.children[1].style.display = 'none';
                elem.children[2].style.display = 'none';

            } else {
                targetElement.style.display = 'none';
                target.innerHTML = 'Display runnable query';

                document.getElementById('smallcode' + targetId).style.display = 'inline';
            }
        }

    //]]></script>

    <style>
        h3 {
            margin-bottom: 0px;
        }

        code {
            display: none;
        }

        code pre {
            padding: 5px;
        }
    </style>
";
    }

    public function getTemplateName()
    {
        return "@Doctrine/Collector/db.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  490 => 171,  484 => 170,  479 => 167,  471 => 164,  467 => 162,  463 => 160,  454 => 158,  450 => 157,  447 => 156,  445 => 155,  440 => 153,  437 => 152,  433 => 151,  423 => 143,  419 => 141,  417 => 140,  412 => 139,  408 => 138,  403 => 135,  397 => 131,  394 => 130,  391 => 129,  389 => 128,  384 => 125,  375 => 120,  372 => 119,  370 => 118,  365 => 115,  347 => 112,  319 => 106,  304 => 99,  295 => 98,  268 => 90,  257 => 87,  245 => 83,  239 => 82,  234 => 80,  192 => 75,  169 => 60,  132 => 51,  128 => 49,  93 => 28,  269 => 94,  254 => 92,  238 => 85,  230 => 79,  227 => 81,  217 => 75,  208 => 73,  179 => 69,  138 => 54,  135 => 53,  94 => 28,  78 => 21,  71 => 17,  203 => 78,  189 => 71,  149 => 51,  144 => 49,  133 => 42,  95 => 28,  86 => 24,  48 => 8,  57 => 11,  51 => 10,  34 => 5,  31 => 4,  795 => 477,  792 => 476,  781 => 474,  777 => 473,  773 => 471,  760 => 470,  734 => 464,  731 => 463,  712 => 461,  695 => 460,  691 => 458,  687 => 457,  683 => 456,  679 => 455,  675 => 454,  671 => 453,  667 => 452,  664 => 451,  662 => 450,  645 => 449,  634 => 447,  619 => 441,  614 => 439,  610 => 438,  607 => 437,  605 => 436,  591 => 434,  586 => 431,  552 => 399,  534 => 396,  517 => 395,  514 => 394,  512 => 393,  507 => 391,  502 => 389,  196 => 92,  182 => 70,  176 => 64,  173 => 65,  170 => 84,  163 => 62,  68 => 30,  62 => 27,  28 => 3,  353 => 121,  344 => 119,  332 => 110,  321 => 112,  318 => 111,  315 => 104,  309 => 108,  306 => 107,  300 => 105,  297 => 104,  291 => 102,  283 => 100,  278 => 94,  274 => 93,  263 => 95,  258 => 94,  224 => 78,  136 => 71,  122 => 43,  117 => 39,  112 => 35,  109 => 34,  104 => 32,  85 => 25,  75 => 19,  58 => 25,  44 => 10,  178 => 66,  175 => 65,  161 => 63,  158 => 80,  154 => 58,  125 => 44,  121 => 50,  118 => 49,  87 => 25,  49 => 14,  46 => 7,  27 => 3,  91 => 27,  63 => 15,  385 => 160,  382 => 159,  374 => 157,  367 => 156,  363 => 126,  359 => 153,  357 => 123,  354 => 151,  351 => 114,  349 => 149,  339 => 146,  336 => 145,  330 => 141,  324 => 108,  322 => 107,  317 => 135,  311 => 131,  308 => 100,  303 => 106,  292 => 121,  289 => 120,  286 => 119,  284 => 118,  279 => 115,  277 => 114,  272 => 111,  270 => 110,  265 => 96,  261 => 105,  255 => 93,  249 => 100,  244 => 97,  242 => 96,  237 => 93,  231 => 83,  228 => 88,  225 => 87,  223 => 86,  218 => 77,  212 => 78,  206 => 77,  204 => 72,  199 => 71,  193 => 73,  190 => 76,  187 => 70,  180 => 63,  174 => 65,  171 => 61,  166 => 56,  159 => 61,  151 => 59,  148 => 46,  143 => 56,  140 => 55,  107 => 36,  103 => 32,  100 => 39,  97 => 23,  88 => 25,  82 => 22,  76 => 34,  61 => 13,  39 => 6,  36 => 5,  79 => 21,  72 => 18,  69 => 17,  54 => 10,  47 => 9,  42 => 7,  40 => 11,  37 => 10,  22 => 1,  246 => 90,  164 => 59,  157 => 56,  145 => 74,  139 => 49,  131 => 52,  120 => 40,  115 => 39,  111 => 37,  108 => 36,  106 => 33,  101 => 32,  98 => 31,  92 => 27,  83 => 33,  80 => 21,  74 => 14,  66 => 11,  60 => 13,  55 => 24,  52 => 12,  50 => 10,  41 => 19,  32 => 4,  29 => 3,  409 => 183,  400 => 180,  396 => 179,  393 => 178,  388 => 177,  386 => 176,  378 => 121,  376 => 158,  369 => 165,  362 => 161,  355 => 157,  348 => 153,  341 => 118,  334 => 145,  327 => 114,  312 => 109,  305 => 129,  298 => 125,  293 => 97,  288 => 95,  285 => 115,  276 => 113,  273 => 96,  271 => 111,  262 => 89,  259 => 103,  251 => 86,  248 => 96,  243 => 88,  240 => 86,  235 => 83,  229 => 87,  221 => 77,  219 => 76,  209 => 76,  202 => 94,  195 => 71,  191 => 67,  188 => 74,  185 => 74,  177 => 65,  172 => 64,  168 => 62,  165 => 83,  162 => 59,  156 => 62,  153 => 77,  150 => 55,  147 => 58,  141 => 48,  134 => 54,  130 => 41,  123 => 61,  119 => 42,  116 => 41,  113 => 48,  105 => 34,  102 => 32,  99 => 31,  96 => 37,  90 => 42,  84 => 40,  81 => 23,  73 => 19,  70 => 15,  67 => 15,  64 => 14,  59 => 14,  53 => 12,  45 => 8,  43 => 12,  38 => 6,  35 => 5,  33 => 4,  30 => 3,);
    }
}
