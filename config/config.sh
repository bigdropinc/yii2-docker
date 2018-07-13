#!/usr/bin/env bash
export COMPOSE_PROJECT_NAME='example_project'
export MY_IP_ADDR=`hostname -I | sed 's/ .*//'`
export USER_ID="`id -u`"

while [[ $# -gt 1 ]]; do
key="$1"

case ${key} in
    -e|--environment)
    ENV="$2"
    shift # past argument
    ;;

    *)
    # unknown option
    ;;
esac
shift # past argument or value
done

if [ -z ${ENV} ]; then
    ENV='local'
fi

if [ ${ENV} == 'local' ]; then
    FILE='config/docker-compose-local.yml'
    YII_ENV='Local'
elif [ ${ENV} == 'dev' ]; then
    FILE='config/docker-compose-dev.yml'
    YII_ENV='Development'
elif [ ${ENV} == 'prod' ]; then
    FILE='config/docker-compose-prod.yml'
    YII_ENV='Production'
elif [ ${ENV} == 'test' ]; then
    FILE='config/docker-compose-tests.yml'
    YII_ENV='Testing'
else
    echo 'Environment not found.'
    exit 1
fi
