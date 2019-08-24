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

/* contrat/index.html.twig */
class __TwigTemplate_2992f7c514fbad1d3527224ede1393b443e0f28a2ce0684e45bd9b3d7e699c74 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "contrat/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "contrat/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Contrat de prestation de service!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
    .p3 { color: red; }
    .surligne { background: yellow; }

</style>

<div class=\"example-wrapper\">
    <strong><em>
    <h1>Contrat de prestation de service</h1>
    <h2>Entre les sousignés:</h2>
    </em></strong>
    <p>
    <span class=\"p1\">
     \"[Raison
     sociale du prestataire, forme juridique, montant de son capital
     social, adresse de son siège social, numéro d'immatriculation au
     RCS et ville où se trouve le greffe qui tient le RCS où il est
     immatriculé]\"
    </span>
    </p>
    <p>
    Représenté par
    <span class=\"p1\">
    [prénom et nom du représentant du
    prestataire, nature de sa fonction et date à laquelle il a été
    habilité à signer pour le compte de la société qu'il
    représente, prénom, nom et fonction de la personne qui l'a
    habilité]
    </span>
    </p>
    <p>Ci-après désigné
   «&nbsp;le Prestataire&nbsp;»</p>
   <p>D'une part,</p>
   <p class=\"h5\">Et&nbsp;:</p>
   <p>
   
    <span class=\"p1\">
    [Raison
  sociale du prestataire, forme juridique, montant de son capital
  social, adresse de son siège social, numéro d'immatriculation au
  RCS et ville où se trouve le greffe qui tient le RCS où il est
  immatriculé]
    </span>
    </p>

    <p>
    Représenté par
    <span class=\"p2\">
    [prénom et nom du représentant du
    prestataire, nature de sa fonction et date à laquelle il a été
    habilité à signer pour le compte de la société qu'il
    représente, prénom, nom et fonction de la personne qui l'a
    habilité]
    </span>
    </p>
   <p>Ci-après désigné
   «&nbsp;le Client&nbsp;»</p>
   <p>D'autre part,</p>
<strong><em>
    <h2>Il a été
      arrêté et convenu ce qui suit&nbsp;:</h2>
    <h3>Article un&nbsp;- Nature de la mission</h3>
</em></strong>
<p>
    Le Client confie
    au Prestataire une mission consistant à répondre aux besoins
    suivants&nbsp;: 
    
</p>

<p>
<span class=\"p3\">
    [Indiquer
    les besoins du client et les services que le prestataire s'engage à
    fournir pour y répondre]
</span>
</p>

<p class=\"surligne\">
     Le cas échéant&nbsp;: 
</p>
<p> 
   Dans le cadre de
   cette mission, le Prestataire s'engage à mettre ses collaborateurs à
   la disposition du Client si cela est nécessaire pour la bonne
   exécution de la mission. Cependant, lesdits salariés resteront sous
   l'autorité et sous la responsabilité du Prestataire pendant leur
   intervention chez le Client. 
</p>

<strong><em>
    <h3>Article deux - Prix et modalités de paiement</h3>
</em></strong>
<p class=\"surligne\">
    Au choix selon le cas&nbsp;:
</p>
<p>
    Le Client
\ts'engage à payer au Prestataire un prix total de 
    <span class=\"p3\">[x]</span>
\t€ hors taxes payable selon l'échéancier suivant&nbsp;:
</p>
<p>
    <span class=\"p3\">[x]</span>

\t\t€ hors taxes lors de la signature du présent contrat,
</p>
<p>
    <span class=\"p3\">[x]</span>
    
\t\t€ hors taxes en fin de mission.
</p>
<p>
    Le Client s'engage à payer un
\tprix fixé en fonction d'un tarif horaire de 
    <span class=\"p3\">[x]</span>
\t€ hors taxes.
</p>
<p>
    D'autre part,
    il s'engage à rembourser au Prestataire les éventuels frais de
    déplacement ou de séjour à l'hôtel qui seraient nécessités
    pour l'exécution de la mission. Ces frais seront engagés après
    accord écrit du Client et ils devront être remboursés sur
    présentation des justificatifs.
</p>
<strong><em>
    <h3>Article trois - Obligations du Prestataire</h3>
</em></strong>

<p>
   Il est rappelé
   que le Prestataire est tenu à une obligation de moyens. Il doit donc
   exécuter sa mission conformément aux règles en vigueur dans sa
   profession et en se conformant à toutes les données acquises dans
   son domaine de compétence.
</p>
<p>
    Il reconnaît que
    le Client lui a donné une information complète sur ses besoins et
    sur les impératifs à respecter.
</p>
<p>
     Il s'engage à se
     conformer au règlement intérieur et aux consignes de sécurité
     applicables chez le Client.
</p>
<p>
     Enfin, il
     s'engage à observer la confidentialité la plus totale en ce qui
     concerne le contenu de la mission et toutes les informations ainsi
     que tous les documents que le Client lui aura communiqués.
</p>
<strong><em>
    <h3>Article quatre - Obligations du Client</h3>
</em></strong>
<p>
   Afin de permettre
   au Prestataire de réaliser la mission dans de bonnes conditions, le
   Client s'engage à lui remettre tous les documents nécessaires
   dans les meilleurs délais.
</p>
<strong><em>
    <h3>Article cinq – Responsabilité</h3>
</em></strong>
<p>
   La responsabilité
   du Prestataire ne pourra être mise en cause qu'en cas de manquement
   à son obligation de moyens. En outre, le Client ne pourra pas
   l'invoquer dans les cas suivants&nbsp;:
</p>
<ul><li><p>
   s'il a omis
\tde remettre au Prestataire un document ou une information nécessaire
\tpour la mission,
</p></li></ul>

<ul><li><p>
   en cas de force majeure ou
\td'autres causes indépendantes de la volonté du Prestataire.
</p></li></ul>
<strong><em>
    <h3>Article six - Droit applicable et juridiction
      compétente</h3>
</em></strong>
<p>
    Le présent
    contrat est assujetti au droit français. Tout litige qui résulterait
    de son exécution sera soumis aux tribunaux dont dépend le siège
    social du Prestataire.
</p>

<p>
   Fait le 
    <span class=\"p3\">[date]</span>
   en deux exemplaires à 
  <span class=\"p3\">[ville]</span>

</p>
<table>
<tbody><tr>

<td>
<p>Le Prestataire</p>
<p>
   <span class=\"p3\">[nom
\t\t\tdu signataire]</span>
</p>
<p>
   <span class=\"p3\">[signature]</span>
</p>
</td>
<td>

  <p>Le client</p>
<p>
   <span class=\"p3\">[nom
\t\t\tdu signataire]</span>
</p>
<p>
   <span class=\"p3\">[signature]</span>
</p>
</td>

<tr></tbody>
</table>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "contrat/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Contrat de prestation de service!{% endblock %}

{% block body %}
<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
    .p3 { color: red; }
    .surligne { background: yellow; }

</style>

<div class=\"example-wrapper\">
    <strong><em>
    <h1>Contrat de prestation de service</h1>
    <h2>Entre les sousignés:</h2>
    </em></strong>
    <p>
    <span class=\"p1\">
     \"[Raison
     sociale du prestataire, forme juridique, montant de son capital
     social, adresse de son siège social, numéro d'immatriculation au
     RCS et ville où se trouve le greffe qui tient le RCS où il est
     immatriculé]\"
    </span>
    </p>
    <p>
    Représenté par
    <span class=\"p1\">
    [prénom et nom du représentant du
    prestataire, nature de sa fonction et date à laquelle il a été
    habilité à signer pour le compte de la société qu'il
    représente, prénom, nom et fonction de la personne qui l'a
    habilité]
    </span>
    </p>
    <p>Ci-après désigné
   «&nbsp;le Prestataire&nbsp;»</p>
   <p>D'une part,</p>
   <p class=\"h5\">Et&nbsp;:</p>
   <p>
   
    <span class=\"p1\">
    [Raison
  sociale du prestataire, forme juridique, montant de son capital
  social, adresse de son siège social, numéro d'immatriculation au
  RCS et ville où se trouve le greffe qui tient le RCS où il est
  immatriculé]
    </span>
    </p>

    <p>
    Représenté par
    <span class=\"p2\">
    [prénom et nom du représentant du
    prestataire, nature de sa fonction et date à laquelle il a été
    habilité à signer pour le compte de la société qu'il
    représente, prénom, nom et fonction de la personne qui l'a
    habilité]
    </span>
    </p>
   <p>Ci-après désigné
   «&nbsp;le Client&nbsp;»</p>
   <p>D'autre part,</p>
<strong><em>
    <h2>Il a été
      arrêté et convenu ce qui suit&nbsp;:</h2>
    <h3>Article un&nbsp;- Nature de la mission</h3>
</em></strong>
<p>
    Le Client confie
    au Prestataire une mission consistant à répondre aux besoins
    suivants&nbsp;: 
    
</p>

<p>
<span class=\"p3\">
    [Indiquer
    les besoins du client et les services que le prestataire s'engage à
    fournir pour y répondre]
</span>
</p>

<p class=\"surligne\">
     Le cas échéant&nbsp;: 
</p>
<p> 
   Dans le cadre de
   cette mission, le Prestataire s'engage à mettre ses collaborateurs à
   la disposition du Client si cela est nécessaire pour la bonne
   exécution de la mission. Cependant, lesdits salariés resteront sous
   l'autorité et sous la responsabilité du Prestataire pendant leur
   intervention chez le Client. 
</p>

<strong><em>
    <h3>Article deux - Prix et modalités de paiement</h3>
</em></strong>
<p class=\"surligne\">
    Au choix selon le cas&nbsp;:
</p>
<p>
    Le Client
\ts'engage à payer au Prestataire un prix total de 
    <span class=\"p3\">[x]</span>
\t€ hors taxes payable selon l'échéancier suivant&nbsp;:
</p>
<p>
    <span class=\"p3\">[x]</span>

\t\t€ hors taxes lors de la signature du présent contrat,
</p>
<p>
    <span class=\"p3\">[x]</span>
    
\t\t€ hors taxes en fin de mission.
</p>
<p>
    Le Client s'engage à payer un
\tprix fixé en fonction d'un tarif horaire de 
    <span class=\"p3\">[x]</span>
\t€ hors taxes.
</p>
<p>
    D'autre part,
    il s'engage à rembourser au Prestataire les éventuels frais de
    déplacement ou de séjour à l'hôtel qui seraient nécessités
    pour l'exécution de la mission. Ces frais seront engagés après
    accord écrit du Client et ils devront être remboursés sur
    présentation des justificatifs.
</p>
<strong><em>
    <h3>Article trois - Obligations du Prestataire</h3>
</em></strong>

<p>
   Il est rappelé
   que le Prestataire est tenu à une obligation de moyens. Il doit donc
   exécuter sa mission conformément aux règles en vigueur dans sa
   profession et en se conformant à toutes les données acquises dans
   son domaine de compétence.
</p>
<p>
    Il reconnaît que
    le Client lui a donné une information complète sur ses besoins et
    sur les impératifs à respecter.
</p>
<p>
     Il s'engage à se
     conformer au règlement intérieur et aux consignes de sécurité
     applicables chez le Client.
</p>
<p>
     Enfin, il
     s'engage à observer la confidentialité la plus totale en ce qui
     concerne le contenu de la mission et toutes les informations ainsi
     que tous les documents que le Client lui aura communiqués.
</p>
<strong><em>
    <h3>Article quatre - Obligations du Client</h3>
</em></strong>
<p>
   Afin de permettre
   au Prestataire de réaliser la mission dans de bonnes conditions, le
   Client s'engage à lui remettre tous les documents nécessaires
   dans les meilleurs délais.
</p>
<strong><em>
    <h3>Article cinq – Responsabilité</h3>
</em></strong>
<p>
   La responsabilité
   du Prestataire ne pourra être mise en cause qu'en cas de manquement
   à son obligation de moyens. En outre, le Client ne pourra pas
   l'invoquer dans les cas suivants&nbsp;:
</p>
<ul><li><p>
   s'il a omis
\tde remettre au Prestataire un document ou une information nécessaire
\tpour la mission,
</p></li></ul>

<ul><li><p>
   en cas de force majeure ou
\td'autres causes indépendantes de la volonté du Prestataire.
</p></li></ul>
<strong><em>
    <h3>Article six - Droit applicable et juridiction
      compétente</h3>
</em></strong>
<p>
    Le présent
    contrat est assujetti au droit français. Tout litige qui résulterait
    de son exécution sera soumis aux tribunaux dont dépend le siège
    social du Prestataire.
</p>

<p>
   Fait le 
    <span class=\"p3\">[date]</span>
   en deux exemplaires à 
  <span class=\"p3\">[ville]</span>

</p>
<table>
<tbody><tr>

<td>
<p>Le Prestataire</p>
<p>
   <span class=\"p3\">[nom
\t\t\tdu signataire]</span>
</p>
<p>
   <span class=\"p3\">[signature]</span>
</p>
</td>
<td>

  <p>Le client</p>
<p>
   <span class=\"p3\">[nom
\t\t\tdu signataire]</span>
</p>
<p>
   <span class=\"p3\">[signature]</span>
</p>
</td>

<tr></tbody>
</table>
</div>
{% endblock %}
", "contrat/index.html.twig", "/home/ndioufa/monprojet/templates/contrat/index.html.twig");
    }
}
