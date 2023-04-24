<?php

namespace App\Http\Livewire\School;

use Livewire\Component;
use Carbon\Carbon;

use App\Traits\ModesTrait;


class CalendarComponent extends Component
{
    use ModesTrait;

    public $monthInfo = [
        'Baisakh' => [ '2022-04-14', '2022-05-14', ],
        'Jestha' => [ '2022-05-15', '2022-06-14', ],
        'Asadh' => [ '2022-06-15', '2022-07-16', ],
        'Shrawan' => [ '2022-07-17', '2022-08-16', ],
        'Bhadra' => [ '2022-08-17', '2022-09-16', ],
        'Ashwin' => [ '2022-09-17', '2022-10-17', ],
        'Kartik' => [ '2022-10-18', '2022-11-16', ],
        'Mangsir' => [ '2022-11-17', '2022-12-15', ],
        'Poush' => [ '2022-12-16', '2023-01-14', ],
        'Magh' => [ '2023-01-15', '2023-02-12', ],
        'Falgun' => [ '2023-02-13', '2023-03-14', ],
        'Chaitra' => [ '2023-03-15', '2023-04-13', ],
    ];

    public $monthInfo2080 = [
        'Baisakh' => [ '2023-04-14', '2023-05-14', ],
        'Jestha' => [ '2023-05-15', '2023-06-15', ],
        'Asadh' => [ '2023-06-16', '2023-07-16', ],
        'Shrawan' => [ '2023-07-17', '2023-08-17', ],
        'Bhadra' => [ '2023-08-18', '2023-09-17', ],
        'Ashwin' => [ '2023-09-18', '2023-10-17', ],
        'Kartik' => [ '2023-10-18', '2023-11-16', ],
        'Mangsir' => [ '2023-11-17', '2023-12-16', ],
        'Poush' => [ '2023-12-17', '2024-01-14', ],
        'Magh' => [ '2024-01-15', '2024-02-12', ],
        'Falgun' => [ '2024-02-13', '2024-03-13', ],
        'Chaitra' => [ '2024-03-14', '2024-04-12', ],
    ];

    public $monthBook = array();

    public $displayMonthName = '';
    public $startDay;
    public $endDay;

    public $eventCreationDay;

    public $modes = [
        'eventCreate' => false,
    ];

    protected $listeners = [
        'calendarEventCreated',
        'exitCalendarEventCreate',
    ];

    public function render()
    {
        if ($this->displayMonthName == '') {
        } else {
            $this->populateMonthBook();
        }

        return view('livewire.school.calendar-component');
    }

    public function selectMonth($monthName)
    {
        $this->displayMonthName = $monthName;
    }

    public function populateMonthBook()
    {
        $monthStartDate = $this->monthInfo2080[$this->displayMonthName][0];
        $monthEndDate = $this->monthInfo2080[$this->displayMonthName][1];

        $monthStartDay = Carbon::parse($monthStartDate);
        $monthEndDay = Carbon::parse($monthEndDate);

        $this->monthBook = array();

        $day = $monthStartDay->copy();

        for ($i = 0; ; $i++) {
            $this->monthBook[] = [
                'day' => $day->copy(),
            ];

            $day = $day->addDay();

            if ($day > $monthEndDay) {
                break;
            }
        }
    }

    public function exitCalendarEventCreate()
    {
        $this->exitMode('eventCreate');
    }

    public function calendarEventCreated()
    {
        $this->exitMode('eventCreate');
    }

    public function addEventForADate($day)
    {
        $this->eventCreationDay = $day;

        $this->enterMode('eventCreate');
    }

}
