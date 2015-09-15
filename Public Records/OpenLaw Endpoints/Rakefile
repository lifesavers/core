#! /usr/bin/env ruby
require 'rake'
require 'rspec'
require 'rspec/core/rake_task'

desc "Run all RSpec test examples"
task :spec do
  RSpec::Core::RakeTask.new do |spec|
    spec.rspec_opts = ["-c", "-f progress"]
    spec.pattern = 'spec/*_spec.rb'
  end
end

task :default => :spec