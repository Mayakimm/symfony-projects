<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* browse/index.html.twig */
class __TwigTemplate_309327ec6f373322493bf198e6ee5ec0 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "browse/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "browse/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "browse/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Hello BrowseController!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "  <div id=\"menu\">
    <img id=\"logo\" src=\"netflims.png\" />
    <a href=\"\">Accueil</a>
    <a href=\"\">Séries</a>
    <a href=\"\">Films</a>
    <a href=\"\">Nouveautés</a>
    <a href=\"\">Ma liste</a>
    <img id=\"avatar\" src=\"https://robohash.org/1\" />
  </div>

  <div id=\"trailer\">
    <video autoplay muted loop id=\"myVideo\">
      <source src=\"extrait-bbb.mp4\" type=\"video/mp4\">
    </video>

    <div class=\"trailer-content\">
      <h1>Big Buck Bunny</h1>
      <p>Lorem ipsum dolor sit amet lorem<br>
        ipsum dolor sit amet. Lorem ipsum dolor sit amet.<br>
        Lorem ipsum dolor sit.
      </p>
      <a href=\"\" class=\"play-btn\">Lecture</a>
    </div>
  </div>

  <div class=\"movies\">
    <h2>Nouveautés sur Netflims</h2>
    <div class=\"movies-list\">
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
    </div>
  </div>
  <div class=\"movies\">
    <h2>Nouveautés sur Netflims</h2>
    <div class=\"movies-list\">
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
    </div>
  </div>

  <h2>Ma Liste</h2>
  <div class=\"movies-list\">
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
      <div class=\"movie-progress-bg\"></div>
      <div class=\"movie-progress\"></div>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
  </div>

  <h2>Notre selection pour vous</h2>
  <div class=\"movies-list\">
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
      <div class=\"movie-progress-bg\"></div>
      <div class=\"movie-progress\"></div>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
  </div>

  <div id=\"popup-container\">
    <div id=\"popup\">
      <button id=\"close-btn\" onClick=\"closeChapters()\">X</button>
      <img src=\"bbb1.jpg\"/>

      <!-- chapitre -->
    </div>
  </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "browse/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello BrowseController!{% endblock %}

{% block body %}
  <div id=\"menu\">
    <img id=\"logo\" src=\"netflims.png\" />
    <a href=\"\">Accueil</a>
    <a href=\"\">Séries</a>
    <a href=\"\">Films</a>
    <a href=\"\">Nouveautés</a>
    <a href=\"\">Ma liste</a>
    <img id=\"avatar\" src=\"https://robohash.org/1\" />
  </div>

  <div id=\"trailer\">
    <video autoplay muted loop id=\"myVideo\">
      <source src=\"extrait-bbb.mp4\" type=\"video/mp4\">
    </video>

    <div class=\"trailer-content\">
      <h1>Big Buck Bunny</h1>
      <p>Lorem ipsum dolor sit amet lorem<br>
        ipsum dolor sit amet. Lorem ipsum dolor sit amet.<br>
        Lorem ipsum dolor sit.
      </p>
      <a href=\"\" class=\"play-btn\">Lecture</a>
    </div>
  </div>

  <div class=\"movies\">
    <h2>Nouveautés sur Netflims</h2>
    <div class=\"movies-list\">
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
    </div>
  </div>
  <div class=\"movies\">
    <h2>Nouveautés sur Netflims</h2>
    <div class=\"movies-list\">
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb3.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb1.jpg\">
        </a>
      </div>
      <div class=\"movie\">
        <a onClick=\"showChapters()\">
          <img src=\"bbb2.jpg\">
        </a>
      </div>
    </div>
  </div>

  <h2>Ma Liste</h2>
  <div class=\"movies-list\">
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
      <div class=\"movie-progress-bg\"></div>
      <div class=\"movie-progress\"></div>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
  </div>

  <h2>Notre selection pour vous</h2>
  <div class=\"movies-list\">
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
      <div class=\"movie-progress-bg\"></div>
      <div class=\"movie-progress\"></div>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb2.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb3.jpg\"/>
      </a>
    </div>
    <div class=\"movie\">
      <a href=\"\">
        <img src=\"bbb1.jpg\"/>
      </a>
    </div>
  </div>

  <div id=\"popup-container\">
    <div id=\"popup\">
      <button id=\"close-btn\" onClick=\"closeChapters()\">X</button>
      <img src=\"bbb1.jpg\"/>

      <!-- chapitre -->
    </div>
  </div>
{% endblock %}
", "browse/index.html.twig", "/Users/maya/code/Mayakimm/symfony-projects/vod-platform/templates/browse/index.html.twig");
    }
}
