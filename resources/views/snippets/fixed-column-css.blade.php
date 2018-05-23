<style>
  .table-scroll {
    position:relative;
    max-width:100%;
    margin:auto;
    overflow:hidden;
  }
  .table-wrap {
    width:100%;
    overflow:auto;
  }
  .table-scroll table {
    width:100%;
    margin:auto;
    border-collapse:separate;
    border-spacing:0;
  }
  .table-scroll th, .table-scroll td {
    padding:5px 10px;
    white-space:nowrap;
    vertical-align:top;
  }

  .clone {
    position:absolute;
    top:0;
    left:0;
    pointer-events:none;
  }
  .clone th, .clone td {
    visibility:hidden
  }
  .clone td, .clone th {
    border-color:transparent
  }
  .clone tbody th {
    visibility:visible;
  }
  .clone .fixed-side {
    background:#eee;
    visibility:visible;
  }
  .clone thead, .clone tfoot{
      background:transparent;
  }
</style>