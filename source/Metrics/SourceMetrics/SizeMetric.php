<?php
namespace Insphptor\Metrics\SourceMetrics;

use Insphptor\Metrics\IMetric;
use Insphptor\Analyzer\AnalyzedClass;

class SizeMetric implements IMetric
{
    private static $weight = 5;

    /**
     * Calcule size from an class
     * @param  AnalyzedClass &$class target class from calculate
     * @return float                size
     */
    public static function value(AnalyzedClass $class) : float
    {
        $size = 0;
        foreach ($class->methods as $method) {
            $size += isset($method['content']) ? count($method['content']) : 0;
        }

        $class->pushMetric('size', ($size / 5) / self::$weight);
        return $size;
    }
}
