<reference name="content">
<block type="page/html_wrapper" name="subscribe.container" translate="label"> 
    <label>Container</label> 
    <action method="setElementClass"><value>cms-statis-block</value></action> 
    <block type="cms/block" name="atf_category_footer" after="category.products">
      <action method="setBlockId"><block_id>atf_category_footer</block_id></action>
    </block>
</block>
</reference>
