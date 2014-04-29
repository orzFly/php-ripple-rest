all: code doc

code: generate.rb
	ruby generate.rb

doc: $(wildcard src/**/*)
	phpdoc -d ./src -t ./docs/api
