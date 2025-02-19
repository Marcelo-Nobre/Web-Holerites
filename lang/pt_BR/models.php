<?php

return [
    'general' => [
        'texts' => [
            'edition_disabled_because_is_canonical' => 'Edição desativada pois o item é canônico',
        ],
    ],
    'fallback' => [
        'actions' => [
            'create' => 'Criar',
            'view-mode' => 'Modo de visualização',
            'edit-mode' => 'Modo de edição',
            'view' => 'Visualizar',
            'edit' => 'Editar',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Nome',
            'slug' => 'Slug',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
        'form' => [
            'id' => 'ID',
            'name' => 'Nome',
            'slug' => 'Slug',
        ],
        'filters' => [
            //
        ],
    ],
    'Document' => [
        'modelLabel' => 'Documento',
        'titleCaseModelLabel' => 'Documento',
        'pluralModelLabel' => 'Documentos',
        'actions' => [
            'create' => 'Cadastrar novo documento',
            'manage' => 'Gerenciar documentos',
        ],
        'pages' => [
            'ListDocuments' => [
                'title' => 'Documentos',
            ],
            'MyDocuments' => [
                'title' => 'Meus Documentos',
            ],
            'ManageDocuments' => [
                'title' => 'Gerenciar documentos',
            ],
        ],
        'table' => [
            'id' => 'ID',
            'title' => 'Título',
            'note' => 'Nota',
            'status' => 'Status',
            'release_date' => 'Disponível a partir de',
            'available_until' => 'Disponível até',
            'internal_note' => 'Nota interna',
            'public_note' => 'Nota pública',
            'storage_file_id' => 'Arquivo',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
    ],
    'DocumentCategory' => [
        'modelLabel' => 'Categoria',
        'titleCaseModelLabel' => 'Categoria',
        'pluralModelLabel' => 'Categorias',
        'actions' => [
            'create' => 'Cadastrar nova categoria',
        ],
        'table' => [
            'id' => 'ID',
            'parent_id' => 'Categoria pai',
            'parent_name' => 'Categoria pai',
            'name' => 'Nome',
            'slug' => 'Slug',
            'icon' => 'Ícone',
            'description' => 'Descrição',
            'seo_title' => 'SEO - Título',
            'seo_description' => 'SEO - Descrição',
            'order_on_tab_filter' => 'Ordem no filtro por guia',
            'show_on_tab_filter' => 'Mostrar no filtro por guia?',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
        'form' => [
            'parent_id' => 'Categoria pai',
            'parent_name' => 'Categoria pai',
            'name' => 'Nome',
            'slug' => 'Slug',
            'icon' => 'Ícone',
            'description' => 'Descrição',
            'seo_title' => 'SEO - Título',
            'seo_description' => 'SEO - Descrição',
            'order_on_tab_filter' => 'Ordem no filtro por guia',
            'show_on_tab_filter' => 'Mostrar no filtro por guia?',
        ],
        'filters' => [
            'status' => 'Status',
        ],
    ],
    'Role' => [
        'modelLabel' => 'Função',
        'titleCaseModelLabel' => 'Função',
        'pluralModelLabel' => 'Funções',
        'actions' => [
            'create' => 'Cadastrar nova função',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Nome',
            'slug' => 'Slug',
            'guard_name' => 'Guard name',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
        'form' => [
            'name' => 'Nome',
            'slug' => 'Slug',
            'guard_name' => 'Guard name',
        ],
        'filters' => [
            'status' => 'Status',
        ],
    ],
    'Permission' => [
        'modelLabel' => 'Permissão',
        'titleCaseModelLabel' => 'Permissão',
        'pluralModelLabel' => 'Permissões',
        'actions' => [
            'create' => 'Cadastrar nova permissão',
            'attach' => 'Vincular permissão',
            'detach' => 'Desvincular permissão',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Nome',
            'roles_count' => 'Roles count',
            'guard_name' => 'Guard name',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
        'form' => [
            'name' => 'Nome',
            'roles_count' => 'Roles count',
            'guard_name' => 'Guard name',
        ],
        'filters' => [
            'status' => 'Status',
        ],
    ],
    'User' => [
        'modelLabel' => 'Usuário',
        'titleCaseModelLabel' => 'Usuário',
        'pluralModelLabel' => 'Usuários',
        'actions' => [
            'create' => 'Criar novo usuário',
            'delete' => 'Inativar usuário',
            'restore' => 'Reativar usuário',
            'view-mode' => 'Modo de visualização',
        ],
        'Relations' => [
            'permissions' => [
                'title' => 'Permissões granulares',
            ],
            'groups' => [
                'title' => 'Grupos',
                'attach' => 'Vincular grupo',
                'detach' => 'Desvincular grupo',
            ],
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha',
            'status' => 'Ativo?',
            'language' => 'Idioma',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
        'form' => [
            'name' => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha',
            'password_confirmation' => 'Confirmação da senha',
            'show_password' => 'Mostrar senha',
            'status' => 'Status',
            'language' => 'Idioma',
            'email_verified_at' => 'E-mail verificado em',
            'main_web_role' => 'Função WEB',
            'main_api_role' => 'Função API',
            'section_roles_heading' => 'Funções',
            'section_extra_info_heading' => 'Informações adicionais',
        ],
        'filters' => [
            'status' => 'Status',
        ],
    ],
    'City' => [
        'modelLabel' => 'Cidade',
        'titleCaseModelLabel' => 'Cidade',
        'pluralModelLabel' => 'Cidades',
        'actions' => [
            'create' => 'Cadastrar Cidade',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Nome',
            'city_code' => 'Código IBGE da cidade',
            'state_code' => 'UF do estado',
            'state_name' => 'Nome do estado',
            'state_local_name' => 'Nome local do estado',
            'country_iso_code' => 'Código ISO do país',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
        'form' => [
            'name' => 'Nome',
            'city_code' => 'Cidade code',
            'state_code' => 'State code',
            'state_name' => 'State name',
            'state_local_name' => 'State local name',
            'country_iso_code' => 'Country ISO code',
        ],
        'filters' => [
            'status' => 'Status',
        ],
    ],
    'Group' => [
        'modelLabel' => 'Grupo de usuários',
        'titleCaseModelLabel' => 'Grupo de usuários',
        'pluralModelLabel' => 'Grupo de usuários',
        'actions' => [
            'create' => 'Novo grupo',
            'attach' => 'Vincular usuário',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Nome',
            'slug' => 'Slug',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'deleted_at' => 'Inativado em',
        ],
        'form' => [
            'name' => 'Nome',
            'slug' => 'Slug',
        ],
        'filters' => [
            'status' => 'Status',
        ],
    ],
];
