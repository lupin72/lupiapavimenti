set :stage, :production

# Simple Role Syntax
# ==================
#role :app, %w{deploy@example.com}
#role :web, %w{deploy@example.com}
#role :db,  %w{deploy@example.com}

# Extended Server Syntax
# ======================
server '146.185.172.191', user: 'serverpilot', roles: %w{web app db}
set :deploy_to, -> { "/srv/users/serverpilot/apps/#{fetch(:application)}/deploy" }
set :linked_files, fetch(:linked_files, []).push('.env', 'web/.htaccess','web/googlec5f3480567f60d05.html')
set :linked_dirs, fetch(:linked_dirs, []).push('web/app/uploads')
# you can set custom ssh options
# it's possible to pass any option but you need to keep in mind that net/ssh understand limited list of options
# you can see them in [net/ssh documentation](http://net-ssh.github.io/net-ssh/classes/Net/SSH.html#method-c-start)
# set it globally
#  set :ssh_options, {
#    keys: %w(~/.ssh/id_rsa),
#    forward_agent: false,
#    auth_methods: %w(password)
#  }

set :keep_releases, 3
fetch(:default_env).merge!(wp_env: :production)

