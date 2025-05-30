function mostrarSecao(secao) {
  document.getElementById("cadastro").style.display = secao === "cadastro" ? "block" : "none";
  document.getElementById("lista").style.display = secao === "lista" ? "block" : "none";
  if (secao === "lista") listarMembros();
}

function exibirInstrumentos(valor) {
  const show = valor === "Sim";
  document.getElementById("instrumentoContainer").style.display = show ? "block" : "none";
  document.getElementById("musicoAtuacao").style.display = show ? "block" : "none";
}

function cadastrarMembro(event) {
  event.preventDefault();

  const formData = new FormData(document.getElementById("formulario"));

  fetch("cadastrar.php", {
    method: "POST",
    body: formData
  })
    .then(res => res.text())
    .then(msg => {
      if (msg.trim() === "ok") {
        alert("Membro cadastrado com sucesso!");
        document.getElementById("formulario").reset();
        exibirInstrumentos("Não");
        mostrarSecao("lista");
      } else {
        throw new Error(msg);
      }
    })
    .catch(err => {
      console.error("Erro ao cadastrar:", err);
      alert("Erro ao cadastrar membro.");
    });
}

function listarMembros(filtro = "") {
  const container = document.getElementById("lista-membros");
  container.innerHTML = "Carregando...";

  fetch("listar.php")
    .then(res => {
      if (!res.ok) throw new Error("Erro na resposta do servidor");
      return res.json();
    })
    .then(membros => {
      container.innerHTML = "";

      const membrosFiltrados = membros.filter(m =>
        m.nome.toLowerCase().includes(filtro.toLowerCase())
      );

      if (membrosFiltrados.length === 0) {
        container.innerHTML = "<p>Nenhum membro encontrado.</p>";
        return;
      }

      const tabela = document.createElement("table");
      tabela.classList.add("table", "table-striped");
      tabela.innerHTML = `
        <thead>
          <tr>
            <th>Nome</th><th>Telefone</th><th>Bairro</th><th>Batizado</th>
            <th>Músico</th><th>Instrumento</th><th>Atuação</th><th>Organista</th>
            <th>Cargo</th>
          </tr>
        </thead>
      `;

      const tbody = document.createElement("tbody");

      membrosFiltrados.forEach((membro) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${membro.nome}</td><td>${membro.telefone}</td><td>${membro.bairro}</td>
          <td>${membro.batizado}</td><td>${membro.musico}</td><td>${membro.instrumento}</td>
          <td>${membro.atuacao}</td><td>${membro.organista}</td><td>${membro.cargo}</td>
        `;
        tbody.appendChild(tr);
      });

      tabela.appendChild(tbody);
      container.appendChild(tabela);
    })
    .catch(err => {
      console.error("Erro ao listar:", err);
      container.innerHTML = "<p>Erro ao carregar membros.</p>";
    });
}

mostrarSecao("cadastro");
