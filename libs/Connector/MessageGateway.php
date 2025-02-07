<?php
/**
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2021/10/20
 * @time 13:34
 */

namespace Luolongfei\Libs\Connector;

abstract class MessageGateway implements MessageServiceInterface
{
    /**
     * 根据模板生成送信内容
     *
     * @param array $data 数据
     * @param string $template 模板内容
     *
     * @return string
     */
    public function genMessageContent(array $data, string $template)
    {
        array_unshift($data, $template);

        return call_user_func_array('sprintf', $data);
    }

    /**
     * 参数数据检查
     *
     * @param string $content
     * @param array $data
     *
     * @throws \Exception
     */
    public function check(string $content, array $data)
    {
        if ($content === '' && empty($data)) {
            throw new \Exception(lang('error_msg.100002'));
        }

        if ($content !== '' && $data) {
            throw new \Exception(lang('error_msg.100004'));
        }
    }
}
