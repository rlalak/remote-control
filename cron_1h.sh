#!/usr/bin/env bash
LOG_MAIN="/var/www/remote-control/log/cron_1h.log"

echo "Cron start: $(date)" >> $LOG_MAIN

TASK="WardrobeFan"
echo "Task $TASK $(date)" >> $LOG_MAIN
php /var/www/remote-control/run-task.php $TASK >> $LOG_MAIN 2 >> $LOG_MAIN

echo "Cron end: $(date)" >> $LOG_MAIN
echo "" >> $LOG_MAIN
