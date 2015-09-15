require 'yaml'
require 'json'
require 'rspec'
require_relative '../sync_yaml_json.rb'

Syncronizr.new

def find_yamls(folder)
  yamls = Dir.glob( File.join(File.dirname(__FILE__), '..', folder, "*.yaml")).reduce([]){ |a,f| a << f }
end

def find_jasons(folder)
  jasons = Dir.glob( File.join(File.dirname(__FILE__), '..', folder, "*.json")).reduce([]){ |a,f| a << f }
end

RSpec.configure do |config|
  config.mock_with :rspec
end

describe 'repo files are the same' do
  ['legislation', 'regulation', 'courts'].each do |type|
    context "for the #{type}" do
      yamls = find_yamls(type)
      jasons = find_jasons(type)
      subject { yamls.count }
      it { expect eql(jasons.count) }
      yamls.each do |yaml_file|
        describe "comparing #{yaml_file} to is json equivalent." do
          let(:json_file) { File.basename(yaml_file, ".yaml") + '.json' }
          data = YAML.load(IO.read(yaml_file))
          subject { JSON.dump(data) }
          it { expect eql(JSON.load(IO.read(File.join(File.dirname(__FILE__), '..', type, json_file)))) }
        end
      end
    end
  end
end