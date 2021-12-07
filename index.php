
  <!-- 主内容区域 -->
  <div class="main-wrapper">
    <div class="main">
      <div class="content">
        <!-- 置顶文章 -->
        <div class="top-post">
          <div class="title">
            置顶
          </div>
          <div class="post-wrapper">
            <%= require('html-withimg-loader!../common/post-card/post-card.html') %>
          </div>
        </div>
        <!-- 文章列表 -->
        <div class="post-list">
          <div class="title">
            最新文章
          </div>
          <div class="list">
            <div class="post-card">
              <%= require('html-withimg-loader!../common/post-card/post-card.html') %>
            </div>
            <div class="post-card">
              <%= require('html-withimg-loader!../common/post-card/post-card.html') %>
            </div>
            <div class="post-card">
              <%= require('html-withimg-loader!../common/post-card/post-card.html') %>
            </div>
            <div class="post-card">
              <%= require('html-withimg-loader!../common/post-card/post-card.html') %>
            </div>
            <div class="post-card">
              <%= require('html-withimg-loader!../common/post-card/post-card.html') %>
            </div>  
            
          </div>
        </div>
        <!-- 分页 -->
        <div class="pagination">
          <%= require('html-withimg-loader!../common/pagination/pagination.html') %>
        </div>
      </div>
      <!-- 侧边栏 -->
      <div class="sidebar">
        <div class="widget">
          <%= require('html-withimg-loader!../common/card-author/card-author.html') %>
        </div>
        <div class="widget">
          <%= require('html-withimg-loader!../common/card-search/card-search.html') %>
        </div>
        <div class="widget">
          <%= require('html-withimg-loader!../common/card-hot-article/card-hot-article.html') %>
        </div>
        <div class="widget">
          <%= require('html-withimg-loader!../common/card-tag/card-tag.html') %>
        </div>
      </div>
      

    </div>
    
  </div>
  <!-- 页脚 -->
  <%= require('html-withimg-loader!../common/footer/footer.html') %>
</body>
</html>