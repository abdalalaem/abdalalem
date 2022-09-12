from pyrogram import Client, filters
from pyrogram.types import Message

from config import HNDLR, call_py
from MusicAndVideo.helpers.decorators import authorized_users_only
from MusicAndVideo.helpers.handlers import skip_current_song, skip_item
from MusicAndVideo.helpers.queues import QUEUE, clear_queue


@Client.on_message(filters.command(["تخ"], prefixes=f"{HNDLR}"))
@authorized_users_only
async def skip(client, m: Message):
    await m.delete()
    chat_id = m.chat.id
    if len(m.command) < 2:
        op = await skip_current_song(chat_id)
        if op == 0:
            await m.reply("**معݪش ، ماެفي شي مشتغݪ ياެعيني 🌵.**")
        elif op == 1:
            await m.reply("معݪش ، ماެفي شي في اެݪاެنتضاެࢪ طݪعت من اެݪمكاެݪمةه ❤️‍🔥**")
        else:
            await m.reply(
                f"**-›  اެبشࢪ عيني تم اެݪتخطي** \n**-›  اެݪحين ࢪاެح اެغني** - [{op[0]}]({op[1]}) | `{op[2]}`",
                disable_web_page_preview=True,
            )
    else:
        skip = m.text.split(None, 1)[1]
        OP = "**🗑️ تمت إزالة الأغاني التالية من قائمة الانتظار: -**"
        if chat_id in QUEUE:
            items = [int(x) for x in skip.split(" ") if x.isdigit()]
            items.sort(reverse=True)
            for x in items:
                if x == 0:
                    pass
                else:
                    hm = await skip_item(chat_id, x)
                    if hm == 0:
                        pass
                    else:
                        OP = OP + "\n" + f"**#⃣{x}** - {hm}"
            await m.reply(OP)


@Client.on_message(filters.command(["ك", "ايقاف"], prefixes=f"{HNDLR}"))
@authorized_users_only
async def stop(client, m: Message):
    await m.delete()
    chat_id = m.chat.id
    if chat_id in QUEUE:
        try:
            await call_py.leave_group_call(chat_id)
            clear_queue(chat_id)
            await m.reply("**اެهݪين عيني اެبشࢪ ۅقفت اެݪاެغنيةه اެݪحين 🌵.**")
        except Exception as e:
            await m.reply(f"**ERROR** \n`{e}`")
    else:
        await m.reply("**معݪش ، ماެفي شي مشتغݪ ياެعيني 🌵.**")


@Client.on_message(filters.command(["بلش"], prefixes=f"{HNDLR}"))
@authorized_users_only
async def pause(client, m: Message):
    await m.delete()
    chat_id = m.chat.id
    if chat_id in QUEUE:
        try:
            await call_py.pause_stream(chat_id)
            await m.reply(
                f"**-›  اެبشࢪ ياެعيني بݪشت اެغني من جديد.**\n\n-› اެذاެ تبي تۅقفهاެ كماެن اެكتب  {HNDLR} كتم"
            )
        except Exception as e:
            await m.reply(f"**ERROR** \n`{e}`")
    else:
        await m.reply("**  معݪش ، ماެفي شي مشتغݪ ياެعيني 🌵.**")


@Client.on_message(filters.command(["وكف"], prefixes=f"{HNDLR}"))
@authorized_users_only
async def resume(client, m: Message):
    await m.delete()
    chat_id = m.chat.id
    if chat_id in QUEUE:
        try:
            await call_py.resume_stream(chat_id)
            await m.reply(
                f"**-›  ياެعيني عݪى نداࢪتك اެبشࢪ ۅقفت اެݪاެغنيةه**\n\n-› اެذاެ تبي تكمݪ اެݪاެغنيةه اكتب{HNDLR}بلش**"
            )
        except Exception as e:
            await m.reply(f"**ERROR** \n`{e}`")
    else:
        await m.reply("**معݪش ، ماެفي شي مشتغݪ ياެعيني 🌵.**")
