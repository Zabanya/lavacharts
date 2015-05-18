<?php namespace Khill\Lavacharts\Tests\Charts;

use \Khill\Lavacharts\Charts\CalendarChart;
use \Mockery as m;

class CalendarChartTest extends ChartTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->cc = new CalendarChart('MyTestChart', $this->mockDataTable);
    }

    public function testInstanceOfLineChartWithType()
    {
        $this->assertInstanceOf('\Khill\Lavacharts\Charts\CalendarChart', $this->cc);
    }

    public function testTypeLineChart()
    {
        $chart = $this->cc;

        $this->assertEquals('CalendarChart', $chart::TYPE);
    }

    public function testLabelAssignedViaConstructor()
    {
        $this->assertEquals('MyTestChart', $this->cc->label);
    }

    public function testCellColor()
    {
        $mockStroke = m::mock('Khill\Lavacharts\Configs\Stroke');
        $mockStroke->shouldReceive('toArray')->once()->andReturn([
            'cellColor' => []
        ]);

        $this->cc->cellColor($mockStroke);

        $this->assertTrue(is_array($this->cc->getOption('cellColor')));
    }

    public function testCellSize()
    {
        $this->cc->cellSize(3);

        $this->assertEquals(3, $this->cc->getOption('cellSize'));
    }

    /**
     * @dataProvider nonIntProvider
     * @expectedException \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function testCellSizeWithBadType($badTypes)
    {
        $this->cc->cellSize($badTypes);
    }

    public function testDayOfWeekLabel()
    {
        $mockTextStyle = m::mock('Khill\Lavacharts\Configs\TextStyle');
        $mockTextStyle->shouldReceive('toArray')->once()->andReturn([
            'dayOfWeekLabel' => []
        ]);

        $this->cc->dayOfWeekLabel($mockTextStyle);

        $this->assertTrue(is_array($this->cc->getOption('dayOfWeekLabel')));
    }

    public function testDayOfWeekRightSpace()
    {
        $this->cc->dayOfWeekRightSpace(5);

        $this->assertEquals(5, $this->cc->getOption('dayOfWeekRightSpace'));
    }

    /**
     * @dataProvider nonIntProvider
     * @expectedException \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function testDayOfWeekRightSpaceWithBadType($badTypes)
    {
        $this->cc->dayOfWeekRightSpace($badTypes);
    }

    public function testDaysOfWeek()
    {
        $this->cc->daysOfWeek('MAWEFWA');

        $this->assertEquals('MAWEFWA', $this->cc->getOption('daysOfWeek'));
    }

    /**
     * @dataProvider nonStringProvider
     * @expectedException \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function testDaysOfWeekWithBadType($badTypes)
    {
        $this->cc->daysOfWeek($badTypes);
    }

    public function testFocusedCellColor()
    {
        $mockStroke = m::mock('Khill\Lavacharts\Configs\Stroke');
        $mockStroke->shouldReceive('toArray')->once()->andReturn([
            'focusedCellColor' => []
        ]);

        $this->cc->focusedCellColor($mockStroke);

        $this->assertTrue(is_array($this->cc->getOption('focusedCellColor')));
    }

    public function testMonthLabel()
    {
        $mockTextStyle = m::mock('Khill\Lavacharts\Configs\TextStyle');
        $mockTextStyle->shouldReceive('toArray')->once()->andReturn([
            'monthLabel' => []
        ]);

        $this->cc->monthLabel($mockTextStyle);

        $this->assertTrue(is_array($this->cc->getOption('monthLabel')));
    }

    public function testMonthOutlineColor()
    {
        $mockStroke = m::mock('Khill\Lavacharts\Configs\Stroke');
        $mockStroke->shouldReceive('toArray')->once()->andReturn([
            'monthOutlineColor' => []
        ]);

        $this->cc->monthOutlineColor($mockStroke);

        $this->assertTrue(is_array($this->cc->getOption('monthOutlineColor')));
    }

    public function testUnderMonthSpace()
    {
        $this->cc->underMonthSpace(5);

        $this->assertEquals(5, $this->cc->getOption('underMonthSpace'));
    }

    /**
     * @dataProvider nonIntProvider
     * @expectedException \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function testUnderMonthSpaceWithBadType($badTypes)
    {
        $this->cc->underMonthSpace($badTypes);
    }

    public function testUnderYearSpace()
    {
        $this->cc->underYearSpace(5);

        $this->assertEquals(5, $this->cc->getOption('underYearSpace'));
    }

    /**
     * @dataProvider nonIntProvider
     * @expectedException \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function testUnderYearSpaceWithBadType($badTypes)
    {
        $this->cc->underYearSpace($badTypes);
    }

    public function testUnusedMonthOutlineColor()
    {
        $mockStroke = m::mock('Khill\Lavacharts\Configs\Stroke');
        $mockStroke->shouldReceive('toArray')->once()->andReturn([
            'unusedMonthOutlineColor' => []
        ]);

        $this->cc->unusedMonthOutlineColor($mockStroke);

        $this->assertTrue(is_array($this->cc->getOption('unusedMonthOutlineColor')));
    }

    public function testColorAxis()
    {
        $mockColorAxis = m::mock('Khill\Lavacharts\Configs\ColorAxis');
        $mockColorAxis->shouldReceive('toArray')->once()->andReturn([
            'colorAxis' => []
        ]);

        $this->cc->colorAxis($mockColorAxis);

        $this->assertTrue(is_array($this->cc->getOption('colorAxis')));
    }

    public function testForceIFrame()
    {
        $this->cc->forceIFrame(true);

        $this->assertTrue($this->cc->getOption('forceIFrame'));
    }

    /**
     * @dataProvider nonBoolProvider
     * @expectedException \Khill\Lavacharts\Exceptions\InvalidConfigValue
     */
    public function testForceIFrameWithBadType($badTypes)
    {
        $this->cc->forceIFrame($badTypes);
    }

    public function testNoDataPattern()
    {
        $mockColor = m::mock('Khill\Lavacharts\Configs\Color');
        $mockColor->shouldReceive('toArray')->once()->andReturn([
            'noDataPattern' => []
        ]);

        $this->cc->noDataPattern($mockColor);

        $this->assertTrue(is_array($this->cc->getOption('noDataPattern')));
    }
}
