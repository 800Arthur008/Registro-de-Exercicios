## Objetivo do Sistema
Criar um sistema simples para *gerenciamento de atividades físicas*, permitindo que usuários registrem seus exercícios, acompanhem duração, calorias gastas e progresso.

---

## 2. Features do MVP

### 2.1 Autenticação
- Registro de usuários (nome, e-mail, senha)
- Login e logout
- Middleware para proteger rotas de exercícios

### 2.2 Exercícios
- Adicionar novo exercício (nome da atividade, duração, calorias gastas, data)
- Listar exercícios do usuário logado
- Editar informações de um exercício
- Remover exercício
- Filtragem por data ou tipo de exercício

### 2.3 Interface
- Layout simples com Blade (Blade Components para header e footer)
- Página principal com lista de exercícios
- Formulários de criação e edição
- Alertas de sucesso ou erro
