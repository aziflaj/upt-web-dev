include_recipe "apache2"

web_app "uptwebdev" do
  server_name "uptweb.dev"
  server_aliases ["www.uptweb.dev"]
  docroot "/var/www/uptweb"
end
