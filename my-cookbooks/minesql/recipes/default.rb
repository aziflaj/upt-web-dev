mysql_service 'default' do
  version '5.6'
  port '3306'
  initial_root_password 'jesuismysql'
  action [:create, :start]
end
