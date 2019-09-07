<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\Bundle\ThemeBundle\Templating\Locator;

use PhpSpec\ObjectBehavior;
use Bundle\ThemeBundle\Locator\ResourceLocatorInterface;
use Bundle\ThemeBundle\Locator\ResourceNotFoundException;
use Bundle\ThemeBundle\Model\ThemeInterface;
use Bundle\ThemeBundle\Templating\Locator\TemplateLocatorInterface;
use Symfony\Component\Templating\TemplateReferenceInterface;

final class TemplateLocatorSpec extends ObjectBehavior
{
    function let(ResourceLocatorInterface $resourceLocator): void
    {
        $this->beConstructedWith($resourceLocator);
    }

    function it_implements_template_locator_interface(): void
    {
        $this->shouldImplement(TemplateLocatorInterface::class);
    }

    function it_proxies_locating_template_to_resource_locator(
        ResourceLocatorInterface $resourceLocator,
        TemplateReferenceInterface $template,
        ThemeInterface $theme
    ): void {
        $template->getPath()->willReturn('@AcmeBundle/Resources/views/index.html.twig');

        $resourceLocator->locateResource('@AcmeBundle/Resources/views/index.html.twig', $theme)->willReturn('/acme/index.html.twig');

        $this->locateTemplate($template, $theme)->shouldReturn('/acme/index.html.twig');
    }

    function it_does_not_catch_exceptions_thrown_while_locating_template_to_resource_locator_even(
        ResourceLocatorInterface $resourceLocator,
        TemplateReferenceInterface $template,
        ThemeInterface $theme
    ): void {
        $template->getPath()->willReturn('@AcmeBundle/Resources/views/index.html.twig');

        $resourceLocator->locateResource('@AcmeBundle/Resources/views/index.html.twig', $theme)->willThrow(ResourceNotFoundException::class);

        $this->shouldThrow(ResourceNotFoundException::class)->during('locateTemplate', [$template, $theme]);
    }
}
