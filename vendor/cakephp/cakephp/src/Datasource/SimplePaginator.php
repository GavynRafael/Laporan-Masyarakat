<?php
declare(strict_types=1);

use function Cake\Core\deprecationWarning;

deprecationWarning(
    'Since 4.2.0: Cake\Datasource\SimplePaginator is deprecated. ' .
    'Use Cake\Datasource\Paging\SimplePaginator instead.'
);
class_exists('Cake\Datasource\Paging\SimplePaginator');
