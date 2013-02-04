module Bourbon::SassExtensions
end

unless defined?(Sass)
  require File.dirname(__FILE__) + '/../../../../scss/lib/sass.rb'
end

require File.join(File.dirname(__FILE__), '/sass_extensions/functions')
