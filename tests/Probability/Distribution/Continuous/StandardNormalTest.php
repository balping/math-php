<?php
namespace MathPHP\Tests\Probability\Distribution\Continuous;

use MathPHP\Probability\Distribution\Continuous\StandardNormal;
use MathPHP\Probability\Distribution\Continuous\Normal;

class StandardNormalTest extends \PHPUnit\Framework\TestCase
{
    public function testPDF()
    {
        $standardNormal = new StandardNormal();
        $normal = new Normal(0, 1);
        $this->assertEquals($normal->pdf(1), $standardNormal->pdf(1));
        $this->assertEquals($normal->pdf(5), $standardNormal->pdf(5));
        $this->assertEquals($normal->pdf(10.23), $standardNormal->pdf(10.23));
    }

    /**
     * @dataProvider dataProviderForCDF
     */
    public function testCDF($z, $cdf)
    {
        $μ = 0;
        $σ = 1;
        $standardNormal = new StandardNormal();
        $normal = new Normal($μ, $σ);
        $this->assertEquals($cdf, $standardNormal->cdf($z), '', 0.0001);
        $this->assertEquals($normal->cdf($z), $standardNormal->cdf($z));
    }

    public function dataProviderForCDF()
    {
        return [
            [1, 0.84134], [5, 0.99997], [10.23, 1],
            [1.96, 0.97500], [-1.96, 0.02500], [-01.960, 0.02500],
            [ 0, 0.5000 ], [ 0.01, 0.5040 ], [ 0.02, 0.5080 ],
            [ 0.30, 0.6179 ], [ 0.31, 0.6217 ], [ 0.39, 0.6517 ],
            [ 2.90, 0.9981 ], [ 2.96, 0.9985 ], [ 3.09, 0.9990 ],
            [ -0, 0.5000 ], [ -0.01, 0.4960 ], [ -0.02, 0.4920 ],
            [ -0.30, 0.3821 ], [ -0.31, 0.3783 ], [ -0.39, 0.3483 ],
            [ -2.90, 0.0019 ], [ -2.96, 0.0015 ], [ -3.09, 0.0010 ],
        ];
    }

    public function testMean()
    {
        $standardNormal = new StandardNormal();
        $this->assertEquals(0, $standardNormal->mean());
    }
}
