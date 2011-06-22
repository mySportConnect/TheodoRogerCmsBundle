<?php

namespace Sadiant\CmsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LayoutControllerTest extends WebTestCase
{
    /**
     * Test layout list
     *
     * @author Mathieu Dähne <mathieud@theodo.fr>
     * @since 2011-06-22
     */
    public function testList()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/admin/layouts');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertRegexp('/.*Layouts.*/', $client->getResponse()->getContent());
        $this->assertRegexp('/.*normal.*/', $client->getResponse()->getContent());
        $this->assertRegexp('/.*Remove.*/', $client->getResponse()->getContent());
    }

    /**
     * Test layout edit
     *
     * @author Mathieu Dähne <mathieud@theodo.fr>
     * @since 2011-06-22
     */
    public function testView()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/admin/layouts/1/edit');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
//        $this->assertRegexp('/.*Layout.*/', $client->getResponse()->getContent());
        $this->assertRegexp('/.*name.*/', $client->getResponse()->getContent());
    }
}
