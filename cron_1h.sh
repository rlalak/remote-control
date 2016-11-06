#!/usr/bin/env bash
LOG_MAIN="/var/www/remote-control/log/cron_1h.log"

echo "Cron start: $(date)" >> $LOG_MAIN

TASK="WardrobeFun"
echo "Task $TASK $(date)" >> $LOG_MAIN
LOG="/var/www/remote-control/log/$TASKTask.log"
php /var/www/remote-control/run-tast.php $TASK >> $LOG 2 >> $LOG_MAIN

echo "Cron end: $(date)" >> $LOG_MAIN
echo "" >> $LOG_MAIN
