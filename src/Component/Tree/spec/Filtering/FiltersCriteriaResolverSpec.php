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

namespace spec\Component\Tree\Filtering;

use PhpSpec\ObjectBehavior;
use Component\Tree\Definition\Filter;
use Component\Tree\Definition\Tree;
use Component\Tree\Filtering\FiltersCriteriaResolverInterface;
use Component\Tree\Parameters;

final class FiltersCriteriaResolverSpec extends ObjectBehavior
{
    function it_implements_filters_criteria_resolver_interface(): void
    {
        $this->shouldImplement(FiltersCriteriaResolverInterface::class);
    }

    function it_checks_whether_any_criteria_are_available(Tree $grid, Filter $filter): void
    {
        $emptyParameters = new Parameters();
        $criteriaParameters = new Parameters(['criteria' => ['czapla']]);

        $grid->getFilters()->willReturn([]);

        $this->hasCriteria($grid, $emptyParameters)->shouldReturn(false);

        $grid->getFilters()->willReturn([]);

        $this->hasCriteria($grid, $criteriaParameters)->shouldReturn(true);

        $grid->getFilters()->willReturn([$filter]);

        $this->hasCriteria($grid, $emptyParameters)->shouldReturn(false);

        $grid->getFilters()->willReturn([$filter]);

        $this->hasCriteria($grid, $criteriaParameters)->shouldReturn(true);

        $grid->getFilters()->willReturn([$filter]);
        $filter->getCriteria()->willReturn('czapla');

        $this->hasCriteria($grid, $emptyParameters)->shouldReturn(true);

        $grid->getFilters()->willReturn([$filter]);
        $filter->getCriteria()->willReturn('czapla');

        $this->hasCriteria($grid, $criteriaParameters)->shouldReturn(true);
    }

    function it_gets_default_criteria_from_grid_filters(Tree $grid, Filter $firstFilter, Filter $secondFilter): void
    {
        $startDate = new \DateTime();
        $endDate = new \DateTime();

        $firstFilter->getCriteria()->willReturn('Pug');
        $secondFilter->getCriteria()->willReturn(['start' => $startDate, 'end' => $endDate]);

        $grid->getFilters()->willReturn(['favourite' => $firstFilter, 'date' => $secondFilter]);

        $this->getCriteria($grid, new Parameters())->shouldIterateAs([
            'favourite' => 'Pug',
            'date' => ['start' => $startDate, 'end' => $endDate],
        ]);
    }

    function it_gets_criteria_from_parameters(Tree $grid, Filter $firstFilter, Filter $secondFilter): void
    {
        $startDate = new \DateTime();
        $endDate = new \DateTime();

        $firstFilter->getCriteria()->willReturn(null);
        $secondFilter->getCriteria()->willReturn(null);

        $grid->getFilters()->willReturn(['favourite' => $firstFilter, 'date' => $secondFilter]);

        $parameters = new Parameters([
            'criteria' => [
                'favourite' => 'Pug',
                'date' => ['start' => $startDate, 'end' => $endDate],
            ],
        ]);

        $this->getCriteria($grid, $parameters)->shouldIterateAs([
            'favourite' => 'Pug',
            'date' => ['start' => $startDate, 'end' => $endDate],
        ]);
    }

    function it_prioritizes_parameters_criteria_over_filters_default(
        Tree $grid,
        Filter $firstFilter,
        Filter $secondFilter
    ): void {
        $parametersDate = new \DateTime();

        $firstFilter->getCriteria()->willReturn('Rum');
        $secondFilter->getCriteria()->willReturn(null);

        $grid->getFilters()->willReturn(['favourite' => $firstFilter, 'date' => $secondFilter]);

        $parameters = new Parameters([
            'criteria' => [
                'favourite' => 'Pug',
                'date' => ['now' => $parametersDate],
            ],
        ]);

        $this->getCriteria($grid, $parameters)->shouldIterateAs([
            'favourite' => 'Pug',
            'date' => ['now' => $parametersDate],
        ]);
    }
}
