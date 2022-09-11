#!/usr/bin/make
# Makefile readme (ru): <http://linux.yaroslavl.ru/docs/prog/gnu_make_3-79_russian_manual.html>
# Makefile readme (en): <https://www.gnu.org/software/make/manual/html_node/index.html#SEC_Contents>


#php artisan vendor:publish --provider="Mar4ehk0\ModuleLoader\ModuleLoaderServiceProvider" --force
#php artisan db:seed --class=Modules\\VideoService\\Database\\Seeders\\DatabaseSeeder


SHELL = /bin/bash

ifeq (,$(wildcard ./.env))
$(shell cp ./.env.example ./.env)
$(shell sed -i "s/^DOCKER_USER=.*/DOCKER_USER=$(shell id -un)/" ./.env)
$(shell sed -i "s/^DOCKER_USER_UID=.*/DOCKER_USER_UID=$(shell id -u)/" ./.env)
$(shell sed -i "s/^DOCKER_USER_GID=.*/DOCKER_USER_GID=$(shell id -g)/" ./.env)
$(shell sed -i "s/^DOCKER_GROUP_NAME=.*/DOCKER_GROUP_NAME=$(shell id -un)/" ./.env)
endif

include ./.env

.DEFAULT_GOAL: help

# This will output the help for each task. thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
.PHONY: help
help: ## Show this help
	@printf "\033[33m%s:\033[0m\n" 'Available commands'
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z0-9_-]+:.*?## / {printf "  \033[32m%-18s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: build
build: ## Build containers
	@$(MAKE) down
	docker compose build

.PHONY: init
init: ## Make full application initialization
	docker compose up -d application
	docker compose exec application composer install --ansi --prefer-dist
	@$(MAKE) --no-print-directory up

.PHONY: run
run: ## Make important task
	@$(MAKE) --no-print-directory init
	$(shell cp $(FILENAME) ./app/$(FILENAME))
	docker compose exec application php public/index.php -f $(FILENAME)

.PHONY: up
up: ## Create and start containers
	docker compose up -d --remove-orphans
	@printf "\n ⠿\e[30;32m %s \033[0m\n" 'Application available';

.PHONY: down
down: ## Stop containers
	docker compose down --remove-orphans

.PHONY: shell sh
shell: ## Start shell into app container
	@(docker compose run --rm --user=$(DOCKER_USER) application ash) || true
sh: shell
