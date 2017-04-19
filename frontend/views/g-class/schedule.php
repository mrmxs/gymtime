<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('site', 'Schedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('site', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$gymBegins = new DateTime('09:00');
$gymEnds = new DateTime('20:01');
$period = new DateInterval('PT60M');

$classSet = testClassSet();
?>

<div class="classes-schedule">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= style(); ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Время</th>
            <th>Понедельник</th>
            <th>Вторник</th>
            <th>Среда</th>
            <th>Четверг</th>
            <th>Пятница</th>
            <th>Суббота</th>
            <th>Воскресенье</th>
        </tr>
        </thead>
        <tbody>
        <? for ($time = $gymBegins; $time < $gymEnds; $time->add($period)) {
            //choose events with time in period
            $eventsInPeriod = filterEventsInPeriod($classSet, $time, $period);
            ?>
            <tr>
                <th><?= $time->format('H:i') ?></th>
                <? for ($dayOfWeek = 1; $dayOfWeek <= 7; $dayOfWeek++) { ?>
                    <td>
                        <? foreach ($eventsInPeriod as $event) {
                            $eventDateOfWeek = (int)(new DateTime($event['date']))->format('w');
                            if ($eventDateOfWeek === ($dayOfWeek !== 7 ? $dayOfWeek : 0)) {
                                $eventEnds = new DateTime($event['time']);
                                $eventEnds->modify("+ {$event['length']}");
                                $eventEnds = $eventEnds->format('H:i');
                                /*echo ScheduleEventCard::widget([
                                    'schedule-event' => $model,
                                ]);*/
                                echo <<<HTML
                     <div class="well well-sm">{$event['title']}<br>
                    {$event['date']}<br>
                    {$event['time']} - $eventEnds</div>
HTML;
                            }
                        } ?>
                    </td>
                <? } ?>
            </tr>
        <? } ?>
        </tbody>
    </table>

</div>


<!--      Generated        -->
<input type="checkbox" title="Hide generated Classes" checked/> <label>Hide generated Classes</label>
<?
echo "<pre>";
print_r($classSet);
echo "</pre>";
?>

<?
function testClassSet()
{
    $testClassSet = [];
    for ($i = 0; $i < 30; $i++) {
        $testNames = ['Yoga', 'Pilates', 'Boxing', 'Tai-Bo', 'Cardio', 'Cycle', 'Dance', 'Stretching', 'Aikido'];
        $testDaysOfWeek = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $testDateTime = new DateTime('next ' . $testDaysOfWeek[array_rand($testDaysOfWeek)] . ' 9:00');
        $testDateTime->modify('+ ' . mt_rand(0, 660) . ' min');
        $testClassSet[] = [
            'id'     => $i,
            'title'  => $testNames[array_rand($testNames)],
            'date'   => $testDateTime->format('Y-m-d'),
            'time'   => $testDateTime->format('H:i'),
            'length' => '2 hours',
        ];
    }

    return $testClassSet;
}

function style()
{
    return <<<CSS
    <style>
        thead th, tbody td {
            width: 13.5%;
        }

        tr > th:first-child {
            width: auto;
        }

        td > .well {
            margin-bottom: 8px;
        }

        td > .well:last-child {
            margin-bottom: 0;
        }

        input:checked + label + pre {
            display: none;
        }
    </style>
CSS;
}

/**
 * @param array $classSet
 * @param DateTime $time
 * @param DateInterval $period
 * @return array
 */
function filterEventsInPeriod(array $classSet, $time, $period) {
    return array_filter($classSet,
        function ($event) use ($time, $period) {
            $classTime = new DateTime($event['time']);
            $timeEdge = clone $time;
            $timeEdge->add($period);

            return $classTime >= $time && $classTime < $timeEdge;
        });
}
?>