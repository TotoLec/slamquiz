<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

     /**
     * Login form show username, password and submit button
     */
    public function testShowLogin()
    {
        // Request /login 
        $this->client->request('GET', '/login');

        // Asserts that /login path exists and don't return an error
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        /*
        Ecrire ici le code pour valider le succès de la réponse HTTP,
        c'est à dire affirmer que le code de statut de la réponse est égale à 200 (Response::HTTP_OK)
        */
       
        
        // Asserts that the phrase "Log in!" is present in the page's title
        $this->assertSelectorTextContains('html h1', 'Please sign in');
        /* 
        Ecrire ici le code pour vérifier la présence de la phrase "Log in!" dans le titre de la page,
        c'est à dire affirmer qu'en parcourant le DOM, la balise 'html head title' contient 'Log in!'
        */ 


        // Asserts that the response content contains 'csrf token'
        $this->assertContains('type="hidden" name="_csrf_token"', $this->client->getResponse()->getContent());
        /*
        Ecrire ici le code pour vérifier la présence du jeton csrf dans le contenu de la réponse HTTP  
        c'est à dire affirmer que le contenu de la réponse contient 'type="hidden" name="_csrf_token"'
        */

        
        // Asserts that the response content contains 'input type="text" id="inputEmail"'
        $this->assertContains('<input type="email" value="" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>', $this->client->getResponse()->getContent());
        /*
        Ecrire ici le code pour vérifier la présence du champ de formulaire email dans le contenu de la réponse HTTP  
        c'est à dire affirmer que le contenu de la réponse contient '<input type="email" value="" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>'
        */

        
        // Asserts that the response content contains 'input type="text" id="inputPassword"'
        $this->assertContains('<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>', $this->client->getResponse()->getContent()); 
        /*
        Ecrire ici le code pour vérifier la présence du champ de formulaire password dans le contenu de la réponse HTTP  
        c'est à dire affirmer que le contenu de la réponse contient '<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>'
        */
        
    }

    public function testNotShowUser()
    {
        // Request /user
        $this->client->request('GET', '/user');

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
        // Asserts that category path move to another path (login)
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur n'est pas connecté, 
        la requête '/category' renvoie vers une autre page (la page /login)
        c'est à dire affirmer que le code de statut de la réponse est égale à 301 (Response::HTTP_MOVED_PERMANENTLY)
        */
        
    }
}
