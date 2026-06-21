<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Evento;
use App\Models\Nota;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Usuário admin ──────────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'admin@etec.edu.br'],
            [
                'name'     => 'Administrador',
                'password' => Hash::make('password'),
            ]
        );

        // ── Cursos ─────────────────────────────────────────────────────
        $cursos = [
            ['nome' => 'Técnico em Informática',         'tipo' => 'tecnico',        'descricao' => 'Forma profissionais para atuar com desenvolvimento, redes e suporte em TI.', 'duracao' => '3 semestres'],
            ['nome' => 'Técnico em Administração',       'tipo' => 'tecnico',        'descricao' => 'Capacita para gestão empresarial, recursos humanos e finanças.', 'duracao' => '3 semestres'],
            ['nome' => 'Técnico em Enfermagem',          'tipo' => 'tecnico',        'descricao' => 'Prepara para auxiliar nos cuidados de saúde em hospitais e clínicas.', 'duracao' => '4 semestres'],
            ['nome' => 'Técnico em Logística',           'tipo' => 'tecnico',        'descricao' => 'Forma especialistas em cadeia de suprimentos, transporte e estoque.', 'duracao' => '3 semestres'],
            ['nome' => 'Técnico em Contabilidade',       'tipo' => 'tecnico',        'descricao' => 'Habilita para atuação em escritórios contábeis e departamentos financeiros.', 'duracao' => '3 semestres'],
            ['nome' => 'Técnico em Desenvolvimento de Sistemas', 'tipo' => 'tecnico', 'descricao' => 'Foco em programação, banco de dados e engenharia de software.', 'duracao' => '3 semestres'],
            ['nome' => 'Especialização em Segurança da Informação', 'tipo' => 'especializacao', 'descricao' => 'Aprofundamento em cybersegurança, redes e proteção de dados.', 'duracao' => '2 semestres'],
            ['nome' => 'Especialização em Gestão de Projetos', 'tipo' => 'especializacao', 'descricao' => 'Metodologias ágeis, PMI e liderança de equipes de alto desempenho.', 'duracao' => '2 semestres'],
        ];

        foreach ($cursos as $c) {
            Curso::firstOrCreate(['nome' => $c['nome']], $c);
        }

        // ── Eventos ────────────────────────────────────────────────────
        $eventos = [
            ['nome' => 'Semana da Tecnologia',             'data' => '2024-05-25', 'descricao' => 'Palestras e workshops sobre as tendências do mercado de tecnologia.', 'local' => 'Auditório Principal'],
            ['nome' => 'Feira de Profissões',               'data' => '2024-06-10', 'descricao' => 'Conheça os cursos e tire suas dúvidas com professores e alunos.', 'local' => 'Pátio Central'],
            ['nome' => 'Hackathon ETEC Zona Leste',        'data' => '2024-06-22', 'descricao' => 'Maratona de programação com premiação para os melhores projetos.', 'local' => 'Lab. de Informática'],
            ['nome' => 'Palestra: Mercado de Trabalho',    'data' => '2024-07-05', 'descricao' => 'Especialistas debatem as oportunidades e desafios do mercado atual.', 'local' => 'Auditório Principal'],
            ['nome' => 'Olimpíada Interna de Matemática',  'data' => '2024-08-12', 'descricao' => 'Competição interna para alunos de todos os cursos técnicos.', 'local' => 'Salas de Aula'],
        ];

        foreach ($eventos as $e) {
            Evento::firstOrCreate(['nome' => $e['nome']], $e);
        }

        // ── Turmas ─────────────────────────────────────────────────────
        $cursoInfo = Curso::where('tipo', 'tecnico')->first();
        $turmasData = [
            ['nome' => '1ºA – Info Manhã',  'curso_id' => $cursoInfo->id, 'periodo' => 'manha', 'ano' => 2024],
            ['nome' => '1ºB – Info Tarde',  'curso_id' => $cursoInfo->id, 'periodo' => 'tarde', 'ano' => 2024],
            ['nome' => '2ºA – Info Manhã',  'curso_id' => $cursoInfo->id, 'periodo' => 'manha', 'ano' => 2024],
        ];

        foreach ($turmasData as $t) {
            Turma::firstOrCreate(['nome' => $t['nome']], $t);
        }

        // ── Alunos ─────────────────────────────────────────────────────
        $turma = Turma::first();
        $nomes = [
            'Ana Paula Silva', 'Bruno Souza', 'Carlos Eduardo Lima',
            'Débora Martins', 'Eduardo Ferreira', 'Fernanda Costa',
            'Gabriel Oliveira', 'Helena Santos', 'Igor Rodrigues', 'Juliana Alves',
        ];

        foreach ($nomes as $i => $nome) {
            $ra = 'RA' . str_pad($i + 1, 6, '0', STR_PAD_LEFT);
            Aluno::firstOrCreate(
                ['ra' => $ra],
                [
                    'nome'     => $nome,
                    'email'    => strtolower(str_replace(' ', '.', $nome)) . '@etec.edu.br',
                    'turma_id' => $turma->id,
                ]
            );
        }

        // ── Notas ──────────────────────────────────────────────────────
        $alunos      = Aluno::all();
        $disciplinas = ['Algoritmos', 'Banco de Dados', 'Redes de Computadores'];

        foreach ($alunos as $aluno) {
            foreach ($disciplinas as $disc) {
                $p1 = round(rand(40, 100) / 10, 1);
                $p2 = round(rand(40, 100) / 10, 1);
                $tr = round(rand(50, 100) / 10, 1);

                Nota::firstOrCreate(
                    ['aluno_id' => $aluno->id, 'disciplina' => $disc, 'periodo' => 1],
                    [
                        'turma_id' => $aluno->turma_id,
                        'prova1'   => $p1,
                        'prova2'   => $p2,
                        'trabalho' => $tr,
                        'media'    => round(($p1 + $p2 + $tr) / 3, 1),
                    ]
                );
            }
        }
    }
}